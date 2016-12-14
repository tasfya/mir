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

    public function setUp(){
        $factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $factory->getController(['controller' => 'questionCategory']);
    }

    public function testIndexAction(){
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
