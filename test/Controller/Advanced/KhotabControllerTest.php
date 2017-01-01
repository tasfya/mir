<?php


namespace Controller\Advanced;


use MirMigration\AutoLoader;
use MirMigration\Controller\Advanced\KhotabController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class KhotabControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var KhotabController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){

        AutoLoader::load();
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'advanced\Khotab']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent(), false);
        $this->assertEquals($data[0]->id,33338);
        $this->assertEquals($data[0]->url,'http://miraath.net/files/audio/sh_muhammad_bin_haady_1435-05-13.mp3');
        $this->assertEquals($data[1]->id,3333069);
    }
}
