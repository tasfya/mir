<?php

namespace MirMigration\Lib\Doctrine;


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use JMS\Serializer\SerializerBuilder;

class Doctrine
{
    /** @var Connection */
    private $connection;
    /** @var Doctrine */
    private static $instance = null;
    /** @var EntityManager */
    private $entityManager;


    public function __construct()
    {
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
        $this->connection = DriverManager::getConnection($connectionParams, $config);
        $config = Setup::createConfiguration(true);
        $driver = new AnnotationDriver(new AnnotationReader(), __DIR__.'/../../');
        SerializerBuilder::create()
                ->setCacheDir(__DIR__.'/../../../var/cache/dev/')
                ->setDebug(true)
                ->build();
        AnnotationRegistry::registerLoader('class_exists');
        $config->setMetadataDriverImpl($driver);
        $this->entityManager = EntityManager::create($connectionParams, $config);
    }

    /** @return Connection */
    public function getConnection(){
        return $this->connection;
    }

    /**
     * @return EntityManager
     */
    public function getManager(){
        return $this->entityManager;
    }

    /**
     * @param string $entityName
     * @return \Doctrine\ORM\EntityRepository
     */
    public function getRepository($entityName){
        return $this->entityManager->getRepository($entityName);
    }

    /**
     * @return Doctrine
     */
    public static function getInstance(){
        if( self::$instance !== null ) return self::$instance;
        self::$instance = new Doctrine();
        return self::getInstance();
    }

}