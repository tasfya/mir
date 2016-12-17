<?php
namespace Controller;


use MirMigration\Controller\SoundCategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class SoundCategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var SoundCategoryController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'soundCategory']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('conditions', ['category' => 0]);
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent(), 'array');
        $this->assertEquals($data[0]['id'],3);
        $this->assertEquals($data[0]['name'],"الدروس العلمية");
        $this->assertEquals($data[1]['id'],4);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(7);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->name,"خطبة الجمعة");
    }
}
