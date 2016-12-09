<?php
namespace MirMigration;

use Dotenv\Dotenv;

class AutoLoader
{

    public static function load(){
        $loader = __DIR__.'/../vendor/autoload.php';
        if (!file_exists($loader)) {
            throw new \RuntimeException('Install dependencies.');
        }
        require_once $loader;

        $env = new Dotenv(__DIR__.'/../');
        $env->load();

        return $loader;
    }

}