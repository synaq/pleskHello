<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 11:33
 */

namespace PleskExt\SynaqPleskHello\Adapter;


use Synaq\HttpClient\Client;

class ExampleHttpClientAdapter
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getApiMessage()
    {
        $this->client->get(null);
    }
}