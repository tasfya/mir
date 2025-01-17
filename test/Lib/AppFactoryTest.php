<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 07/12/16
 * Time: 03:55 م
 */

namespace Lib;


use MirMigration\Lib\AppFactory;
use MirMigration\Lib\Doctrine\Doctrine;
use MirMigration\Lib\Routing;
use Symfony\Component\HttpFoundation\Request;


class AppFactoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var AppFactory */
    private $factory;

    public function setUp()
    {
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
    }

    public function testGet(){
        $this->assertEquals(Routing::class, get_class($this->factory->getRouting()));
        $this->assertEquals(Doctrine::class, get_class($this->factory->getDoctrine()));
        $this->assertEquals(Request::class, get_class($this->factory->getRequest()));
    }
}
