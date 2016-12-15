<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 08/12/16
 * Time: 04:42 م
 */

namespace Controller;


use MirMigration\Controller\QuestionCategoryController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class QuestionCategoryControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var QuestionCategoryController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'questionCategory']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('conditions', ['category' => 0]);
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,11);
        $this->assertEquals($data[1]->id,12);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(71);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->place,29);
    }

}
