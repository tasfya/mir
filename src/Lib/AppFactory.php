<?php
namespace MirMigration\Lib;

use Symfony\Component\HttpFoundation\Request;

class AppFactory
{
    private $request;

    /**
     * AppFactory constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return Routing
     */
    public function getRouting(){
        return new Routing($this, new Yaml());
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getDoctrine(){
        return Doctrine::getInstance($this, new Yaml());
    }

    /**
     * @return Request
     */
    public function getRequest(){
        return $this->request;
    }

    /**
     * @param $parameters
     * @return mixed
     */
    public function getController($parameters){
        $classname = "MirMigration\\Controller\\".ucfirst($parameters['controller'])."Controller";
        return new $classname($this);
    }

    /**
     * @return string
     */
    public function getRootDir(){
        return __DIR__.'/../..';
    }

}
