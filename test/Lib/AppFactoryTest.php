<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 07/12/16
 * Time: 03:55 م
 */

namespace Lib;


use MirMigration\Lib\AppFactory;
use MirMigration\Lib\Routing;


class AppFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new AppFactory();
    }

    public function testGet(){
        $this->assertEquals(Routing::class, get_class($this->factory->getRouting()));
    }
}
