<?php
namespace Controller;


use MirMigration\Controller\SoundCategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class SoundCategoryTest extends \PHPUnit_Framework_TestCase
{
    /** @var SoundCategoryController */
    private $controller;

    public function setUp(){
        $factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $factory->getController(['controller' => 'soundCategory']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,3);
        $this->assertEquals($data[0]->name,"الدروس العلمية");
        $this->assertEquals($data[1]->id,4);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(7);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->name,"خطبة الجمعة");
    }
}
