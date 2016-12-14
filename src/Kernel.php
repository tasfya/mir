<?php
namespace MirMigration;

use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel{

    private $env;

    public function __construct($env){
        if( $env == 'dev' || true ) {
            ini_set('display_errors', 'On');
            error_reporting(E_ALL);
        }
        $this->env = $env;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request){
        $factory = new AppFactory($request, $this->env);
        $routing = $factory->getRouting();
        $parameters = $routing->match($request->getPathInfo());

        $controller = $factory->getController($parameters);
        $response = call_user_func_array([$controller, $parameters['action']], $parameters['parameters']);

        return $response;
    }

}
