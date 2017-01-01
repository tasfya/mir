<?php
namespace Controller;


use MirMigration\Controller\BookDischargeController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class BookDischargeControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var BookDischargeController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'bookDischarge']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('date_begin', '2016-12-01');
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,337);
        $this->assertEquals($data[0]->subject,'الوسطية والاعتدال');
        $this->assertEquals($data[1]->id,338);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(10);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->subject,'شرح حديث «إن أمتكم هذه جعل عافيتها في أولها»');
    }

}
