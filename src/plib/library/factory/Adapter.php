<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 11:19
 */

require_once __DIR__ . '/../../vendor/composer/autoload_real.php';

class Modules_SynaqPleskHello_Factory_Adapter
{
    /**
     * @var \Synaq\HttpClient\Client
     */
    private $client;

    public function __construct(\Synaq\HttpClient\Client $client)
    {
        $this->client = $client;
    }

    public static function createForHttpClient(\Synaq\HttpClient\Client $client)
    {
        return new self($client);
    }

    public function getClient()
    {
        return $this->client;
    }
}