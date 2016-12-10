<?php
namespace MirMigration\Lib;

use MirMigration\Lib\Doctrine\Doctrine;
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
     * @return Doctrine
     */
    public function getDoctrine(){
        return Doctrine::getInstance();
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
        $name = $parameters['controller'] == 'controller' ? 'Controller' :
            ucfirst($parameters['controller'])."Controller";
        $classname = "MirMigration\\Controller\\".$name;
        return new $classname($this);
    }

    /**
     * @return string
     */
    public function getRootDir(){
        return __DIR__.'/../..';
    }

}
