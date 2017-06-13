<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 11:39
 */

namespace PleskExt\SynaqPleskHello\Tests\Adapter;

use Mockery as m;
use PleskExt\SynaqPleskHello\Adapter\ExampleHttpClientAdapter;
use Synaq\HttpClient\Client;
use Synaq\HttpClient\Response;

class ExampleHttpClientAdapterGetApiMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ExampleHttpClientAdapter
     */
    private $adapter;

    /**
     * @var Client | m\Mock
     */
    private $client;

    /**
     * @test
     */
    public function callsGetOnce()
    {
        $this->adapter->getApiMessage();
        $this->client->shouldHaveReceived('get')->once();
    }

    /**
     * @test
     */
    public function callsGetOnThePleskHelloWorldConfigurationCategoryUnderTheSpecifiedBaseUrl()
    {
        $this->adapter = new ExampleHttpClientAdapter($this->client, 'https://some-domain.com/api/');
        $this->adapter->getApiMessage();
        $this->client->shouldHaveReceived('get')->with('https://some-domain.com/api/configs/pleskHello.json');
    }

    /**
     * @test
     */
    public function acceptsAnyBaseUrlForTheApi()
    {
        $this->adapter = new ExampleHttpClientAdapter($this->client, 'https://any-domain.com/public-api/');
        $this->adapter->getApiMessage();
        $this->client->shouldHaveReceived('get')->with('https://any-domain.com/public-api/configs/pleskHello.json');
    }

    /**
     * @test
     */
    public function returnsMessageReturnedByTheApi()
    {
        $this->client->shouldReceive('get')->andReturn($this->httpOkayResponseWithMessage('The message'));
        $this->assertEquals('The message', $this->adapter->getApiMessage());
    }

    /**
     * @test
     */
    public function acceptsAnyMessageFromTheApi()
    {
        $this->client->shouldReceive('get')->andReturn($this->httpOkayResponseWithMessage('Any message'));
        $this->assertEquals('Any message', $this->adapter->getApiMessage());
    }

    protected function setUp()
    {
        $this->client = m::mock(Client::class);
        $this->client->shouldReceive('get')->andReturn($this->httpOkayResponseWithMessage('Foo'))->byDefault();
        $this->client->shouldIgnoreMissing();

        $this->adapter = new ExampleHttpClientAdapter($this->client, null);
    }

    private function httpOkayResponseWithMessage($message) {
        $raw = "HTTP/1.1 200 OK\r\n".
                "Server: nginx/1.10.1\r\n".
                "Transfer-Encoding: Identity\r\n".
                "Content-Type: application/json\r\n".
                "Date: Tue, 13 Jun 2017 14:00:03 GMT\r\n".
                "Connection: keep-alive\r\n".
                "X-Powered-By: PHP/5.5.30\r\n".
                "Cache-Control: private\r\n".
                "X-Cached: MISS\r\n\r\n".
                "{\"message\": \"$message\"}";

        return new Response($raw);
    }
}
