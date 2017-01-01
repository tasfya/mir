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
        $this->assertEquals($data[0]->matne_id, 222623);
    }
}
