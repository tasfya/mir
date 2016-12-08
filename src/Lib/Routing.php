<?php
namespace MirMigration\Lib;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Routing
{
    /** @var AppFactory */
    private $factory;
    /** @var  UrlMatcher */
    private $matcher;

    /**
     * Routing constructor.
     * @param AppFactory $factory
     * @param \MirMigration\Lib\Yaml $parser
     */
    public function __construct(AppFactory $factory, Yaml $parser)
    {
        $this->factory = $factory;

        $this->generateRoutes($parser);
    }

    /**
     * @param \MirMigration\Lib\Yaml $parser
     */
    public function generateRoutes(Yaml $parser){
        $routes = new RouteCollection();
        $configs = $parser->loadFile($this->factory->getRootDir().'/src/config/routing.yml');
        foreach ($configs as $config){
            if( isset($config['path'], $config['controller']) ){
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
            }
        };
        $context = new RequestContext('/');
        $this->matcher = new UrlMatcher($routes, $context);
    }

    /**
     * @param $url
     * @return array
     */
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
