<?php


namespace Controller\Advanced;


use MirMigration\AutoLoader;
use MirMigration\Controller\Advanced\ExplanationCourseController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class ExplanationCourseControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ExplanationCourseController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){

        AutoLoader::load();
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'advanced\ExplanationCourse']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction(623);
        $data = json_decode($response->getContent(), false);
        $this->assertEquals($data[0]->id,33436);
        $this->assertEquals($data[0]->url,"http://miraath.net/sounds/0e2f605787866aa9ad90f212d669c9e7.mp3");
        $this->assertEquals($data[1]->id,33437);
    }
}
