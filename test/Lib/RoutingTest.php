<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 07/12/16
 * Time: 03:50 م
 */

namespace Lib;


use MirMigration\Lib\AppFactory;
use MirMigration\Lib\Routing;
use MirMigration\Lib\Yaml;
use Symfony\Component\HttpFoundation\Request;


class RoutingTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Routing
     */
    private $routing;

    public function setUp()
    {
        $this->routing = new Routing(new AppFactory(Request::createFromGlobals(), 'prod'), new Yaml());
    }

    public function testMatch(){
        $paramaters = $this->routing->match("/");
        $this->assertEquals('default', $paramaters['controller']);
        $this->assertEquals('indexAction', $paramaters['action']);
    }

}
