<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/13
 * Time: 10:29
 */

require_once __DIR__ . '/../../vendor/composer/autoload_real.php';

class Modules_SynaqPleskHello_Factory_Client
{
    public static function create()
    {
        return new \Synaq\HttpClient\Client();
    }
}