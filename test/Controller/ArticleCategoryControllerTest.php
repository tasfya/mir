<?php
namespace Controller;


use MirMigration\Controller\ArticleCategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class ArticleCategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ArticleCategoryController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'articleCategory']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,7);
        $this->assertEquals($data[1]->id,8);
    }

}
