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

        $parameters = $parser->loadFile($factory->getRootDir().'/src/config/config.yml');
        $config = new Configuration();
        $connectionParams = [
            'dbname' => $parameters['doctrine']['dbal']['dbname'],
            'user' => $parameters['doctrine']['dbal']['user'],
            'password' => $parameters['doctrine']['dbal']['password'],
            'host' => $parameters['doctrine']['dbal']['host'],
            'driver' => $parameters['doctrine']['dbal']['driver'],
        ];
        self::$instance = DriverManager::getConnection($connectionParams, $config);
        return self::getInstance($factory, $parser);
    }

}
