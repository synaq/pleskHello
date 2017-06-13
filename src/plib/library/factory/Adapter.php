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
    public static function createForHttpClient(\Synaq\HttpClient\Client $client)
    {
        return new self();
    }
}