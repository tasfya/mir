<?php
namespace MirMigration;

use Dotenv\Dotenv;

class AutoLoader
{

    public static function load(){
        $env = new Dotenv(__DIR__.'/../');
        $env->load();

        return __DIR__.'/../vendor/autoload.php';
    }

}