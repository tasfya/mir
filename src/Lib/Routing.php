<?php
namespace MirMigration\Lib;

use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class Routing
{
    /** @var AppFactory */
    private $factory;
    /** @var  RouteCollection */
    private $routes;

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
        $this->routes = new RouteCollection();
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
                $this->routes->add(!isset($config['name'])? uniqid() : $config['name'], $route);
            }
        };
    }

    /**
     * @param $url
     * @return array
     */
    public function match($url){
        $context = new RequestContext('/');
        $matcher = new UrlMatcher($this->routes, $context);
        $url = $url == '' ? '/': $url;
        try{
            $parameters = $matcher->match($url);
            $parameters['controller'] = explode('@', $parameters['controller']);

            $params = [
                'controller' => $parameters['controller'][0],
                'action' => $parameters['controller'][1].'Action',
                '_route' => $parameters['_route'][1],
            ];

            unset( $parameters['controller'], $parameters['_route'] );
            $params['parameters'] = $parameters;
        }
        catch (ResourceNotFoundException $e){
            $params = [
                'controller' => 'controller',
                'action' => 'error404Action',
                'parameters' => [],
            ];
        }

        return $params;
    }

    /**
     * @param $name
     * @param mixed $parameters
     * @param int $referenceType
     * @return string
     */
    public function generateUrl($name, $parameters = array(), $referenceType = UrlGenerator::ABSOLUTE_PATH){
        $context = new RequestContext('/');
        $generator = new UrlGenerator($this->routes, $context);
        return $generator->generate($name, $parameters, $referenceType);
    }
}
