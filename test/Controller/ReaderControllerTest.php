<?php
namespace Controller;


use MirMigration\Controller\ReaderController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class ReaderControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ReaderController */
    private $controller;

    public function setUp(){
        $factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $factory->getController(['controller' => 'reader']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,1);
        $this->assertEquals($data[0]->name,"محمد بن هادي المدخلي");
        $this->assertEquals($data[1]->id,2);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(3);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->name,"عبد القادر بن محمد الجنيد");
    }
}
