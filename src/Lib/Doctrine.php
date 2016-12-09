<?php

namespace MirMigration\Lib;


use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;

class Doctrine
{
    private static $instance = null;

    /**
     * @param \MirMigration\Lib\AppFactory $factory
     * @param \MirMigration\Lib\Yaml $parser
     * @return Connection
     */
    public static function getInstance(AppFactory $factory, Yaml $parser){
        if( self::$instance !== null ) return self::$instance;

        $config = new Configuration();
        $connectionParams = [
            'dbname' => getenv('DB_NAME'),
            'user' => getenv('DB_USER'),
            'host' => getenv('DB_HOST'),
            'driver' => 'pdo_mysql',
        ];
        if(getenv('DB_PASSWORD')){
            $connectionParams['password'] = getenv('DB_PASSWORD');
        }
        self::$instance = DriverManager::getConnection($connectionParams, $config);
        return self::getInstance($factory, $parser);
    }

}
