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

    protected function setUp()
    {
        $this->client = m::mock(Client::class);
        $this->client->shouldIgnoreMissing();

        $this->adapter = new ExampleHttpClientAdapter($this->client, null);
    }
}
