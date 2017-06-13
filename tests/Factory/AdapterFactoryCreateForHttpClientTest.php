<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 11:20
 */

namespace PleskExt\SynaqPleskHello\Tests\Factory;

use Synaq\HttpClient\Client;

class AdapterFactoryCreateForHttpClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnsAdapter()
    {
        $adapter = \Modules_SynaqPleskHello_Factory_Adapter::createForHttpClient(new Client());
        $this->assertInstanceOf(\Modules_SynaqPleskHello_Factory_Adapter::class, $adapter);
    }

    /**
     * @test
     */
    public function returnsAdapterBoundToClientProvidedAsParameter()
    {
        $client = new Client();
        $adapter = \Modules_SynaqPleskHello_Factory_Adapter::createForHttpClient($client);
        $this->assertEquals($client, $adapter->getClient());
    }
}
