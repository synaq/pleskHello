<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 11:20
 */

namespace PleskExt\SynaqPleskHello\Tests\Factory;

use PleskExt\SynaqPleskHello\Adapter\ExampleHttpClientAdapter;
use Synaq\HttpClient\Client;

class AdapterFactoryCreateForHttpClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnsAdapter()
    {
        $adapter = \Modules_SynaqPleskHello_Factory_Adapter::createForHttpClientOnBaseUrl(new Client(), null);
        $this->assertInstanceOf(ExampleHttpClientAdapter::class, $adapter);
    }

    /**
     * @test
     */
    public function returnsAdapterBoundToClientProvidedAsParameter()
    {
        $client = new Client();
        $adapter = \Modules_SynaqPleskHello_Factory_Adapter::createForHttpClientOnBaseUrl($client, null);
        $this->assertEquals($client, $adapter->getClient());
    }

    /**
     * @test
     */
    public function returnsAdapterWithSuppliedBaseUrl()
    {
        $adapter = \Modules_SynaqPleskHello_Factory_Adapter::createForHttpClientOnBaseUrl(new Client(), 'https://some-domain.com/api/v1');
        $this->assertEquals('https://some-domain.com/api/v1', $adapter->getBaseUrl());
    }
}
