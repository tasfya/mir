<?php
namespace MirMigration\Lib;

use MirMigration\Lib\Doctrine\Doctrine;
use Symfony\Component\HttpFoundation\Request;

class AppFactory
{
    private $request;
    private $env;

    /**
     * AppFactory constructor.
     * @param Request $request
     */
    public function __construct(Request $request, $env)
    {
        $this->request = $request;
        $this->env;
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
        return Doctrine::getInstance($this->env == 'dev');
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
