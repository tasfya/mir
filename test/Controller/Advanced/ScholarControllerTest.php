<?php


namespace Controller\Advanced;


use MirMigration\AutoLoader;
use MirMigration\Controller\Advanced\ScholarController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class ScholarControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ScholarController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){

        AutoLoader::load();
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'advanced\Scholar']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,1);
        $this->assertEquals($data[0]->name,"محمد بن هادي المدخلي");
        $this->assertEquals($data[1]->id,2);
    }
}
