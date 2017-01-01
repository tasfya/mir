<?php


namespace Controller\Advanced;


use MirMigration\AutoLoader;
use MirMigration\Controller\Advanced\MoutouneController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class MoutouneControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var MoutouneController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){

        AutoLoader::load();
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'advanced\Moutoune']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,22267);
        $this->assertEquals($data[0]->title,"منهاج السالكين وتوضيح الفقه في الدين");
        $this->assertEquals($data[1]->id,22268);
    }
}
