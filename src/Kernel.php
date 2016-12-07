<?php
namespace MirMigration;

use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel{

    public function __construct($cache = true){
        // the cache is not implemented
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request){
        $factory = new AppFactory();
        $routing = $factory->getRouting();
        $uri = str_replace($request->getBaseUrl(), "", $request->getRequestUri());
        $parameters = $routing->match($uri);

        $controller = $factory->getController($request, $parameters);
        $response = call_user_func_array([$controller, $parameters['action']], $parameters['parameters']);

        return $response;
    }

}
