<?php


namespace Controller\Advanced;


use MirMigration\AutoLoader;
use MirMigration\Controller\Advanced\ExplanationController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class ExplanationControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ExplanationController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){

        AutoLoader::load();
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'advanced\Explanation']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction(623);
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->scholar_id,11111);
        $this->assertEquals($data[0]->matne_id, 623);
    }

    public function testallAction(){
        $this->factory->getRequest()->query->set('begin', '2016-11-01');
        $this->factory->getRequest()->query->set('end', '2016-11-15');
        $response = $this->controller->allAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->scholar_id,1111);
        $this->assertEquals($data[0]->matne_id, 222643);
        $this->assertEquals($data[0]->explanation_id, 1643);
    }
}
