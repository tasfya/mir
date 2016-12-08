<?php
namespace MirMigration\Lib;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use MirMigration\Lib\Yaml;

class Routing
{
    private $factory;
    private $matcher;

    public function __construct(AppFactory $factory, Yaml $parser)
    {
        $this->factory = $factory;

        $this->generateRoutes($parser);
    }

    public function generateRoutes(Yaml $parser){
        $routes = new RouteCollection();
        $configs = $parser->loadFile($this->factory->getRootDir().'/src/config/routing.yml');
        foreach ($configs as $config){
            $route = new Route(
                $config['path'],
                ['controller' => $config['controller']],
                isset($config['requirements']) ? $config['requirements'] : [],
                isset($config['options']) ? $config['options'] : [],
                isset($config['host']) ? $config['host'] : null,
                isset($config['schemes']) ? $config['schemes'] : [],
                isset($config['methods']) ? $config['methods'] : []
            );
            $routes->add(!isset($config['name'])? uniqid() : $config['name'], $route);
        };
        $context = new RequestContext('/');
        $this->matcher = new UrlMatcher($routes, $context);
    }

    public function match($url){
        $url = $url == '' ? '/': $url;
        $parameters = $this->matcher->match($url);
        $parameters['controller'] = explode('@', $parameters['controller']);

        $params = [
            'controller' => $parameters['controller'][0],
            'action' => $parameters['controller'][1].'Action',
            '_route' => $parameters['_route'][1],
        ];

        unset( $parameters['controller'], $parameters['_route'] );
        $params['parameters'] = $parameters;

        return $params;
    }
}
