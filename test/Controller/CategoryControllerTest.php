<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 08/12/16
 * Time: 04:42 م
 */

namespace Controller;


use MirMigration\Controller\CategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class CategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var CategoryController */
    private $controller;

    public function setUp(){
        $factory = new AppFactory(Request::createFromGlobals());
        $this->controller = $factory->getController(['controller' => 'category']);
    }

    public function testIndexAction(){
        // $this->markTestSkipped("Database not found");
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,11);
        $this->assertEquals($data[1]->id,12);
    }

    public function testViewAction(){
        // $this->markTestSkipped("Database not found");
        $response = $this->controller->viewAction(71);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->place,29);
    }

}
