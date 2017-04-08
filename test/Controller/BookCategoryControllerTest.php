<?php
namespace Controller;


use MirMigration\Controller\BookCategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class PaperCategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var BookCategoryController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'bookCategory']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('conditions', ['category' => 0]);
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,493);
        $this->assertEquals($data[1]->id,494);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(494);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->place,0);
    }

}
