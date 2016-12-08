<?php
namespace MirMigration\Lib;


use MirMigration\Lib\Doctrine;
use Symfony\Component\HttpFoundation\Request;

class AppFactory
{

    public function getRouting(){
        return new Routing($this, new Yaml());
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getDoctrine(){
        return Doctrine::getInstance($this, new Yaml());
    }

    public function getController(Request $request, $parameters){
        $classname = "MirMigration\\Controller\\".ucfirst($parameters['controller'])."Controller";
        return new $classname($this, $request);
    }

    public function getRootDir(){
        return __DIR__.'/../..';
    }

}