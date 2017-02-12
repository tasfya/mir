<?php


namespace Controller\Advanced;


use MirMigration\AutoLoader;
use MirMigration\Controller\Advanced\SoundController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class SoundControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var SoundController */
    private $controller;
    /** @var AppFactory */
    private $factory;

    public function setUp(){

        AutoLoader::load();
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'advanced\Sound']);
    }

    public function testKhotabsAction(){
        $response = $this->controller->khotabsAction();
        $data = json_decode($response->getContent(), false);
        $this->assertEquals($data[0]->id,44438);
        $this->assertEquals($data[0]->url,'http://old.miraath.net/files/audio/sh_muhammad_bin_haady_1435-05-13.mp3');
        $this->assertEquals($data[1]->id,4443069);
    }

    public function testMohadaratesAction(){
        $response = $this->controller->mohadaratesAction();
        $data = json_decode($response->getContent(), false);
        $this->assertEquals($data[0]->id,99928);
        $this->assertEquals($data[0]->url,'http://old.miraath.net/files/audio/haqq_ur_raee_war_raiyyah_sh_haddady.mp3');
        $this->assertEquals($data[1]->id,99932);
    }

    public function testSalasilesAction(){
        $response = $this->controller->salasilesAction();
        $data = json_decode($response->getContent(), false);
        $this->assertEquals($data[0]->id,1000442);
        $this->assertEquals($data[0]->url,'http://old.miraath.net/files/audio/%20%D8%A7%D9%84%D8%A3%D9%85%D8%B1%20%D8%A8%D8%A7%D9%84%D9%85%D8%B9%D8%B1%D9%88%D9%81%20%D9%88%D8%A7%D9%84%D9%86%D9%87%D9%8A%20%D8%B9%D9%86%20%D8%A7%D9%84%D9%85%D9%86%D9%83%D8%B1%20%D9%88%D8%A3%D8%AB%D8%B1%D9%87-%D');
        $this->assertEquals($data[1]->id,1000443);
    }
}
