<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 10:31
 */

namespace PleskExt\SynaqPleskHello\Tests\Factory;

use Synaq\HttpClient\Client;

class ClientFactoryCreateClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function returnsASyncHttpClient()
    {
        $client = \Modules_SynaqPleskHello_Factory_Client::create();
        $this->assertInstanceOf(Client::class, $client);
    }
}
