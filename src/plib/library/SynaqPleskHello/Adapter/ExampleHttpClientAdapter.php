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
    private $baseUrl;

    public function __construct(Client $client, $baseUrl)
    {
        $this->client = $client;
        $this->baseUrl = $baseUrl;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getApiMessage()
    {
        $this->client->get($this->baseUrl . 'configs/pleskHello.json');

        return 'The message';
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
}