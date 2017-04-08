<?php
namespace Controller;


use MirMigration\Controller\BookCategoryController;
use MirMigration\Controller\PaperCategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class BookCategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var PaperCategoryController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'paper']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,150);
        $this->assertEquals($data[1]->id,108);
    }

}
