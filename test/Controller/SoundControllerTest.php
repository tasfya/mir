<?php
namespace Controller;


use MirMigration\Controller\SoundController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class SoundControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var SoundController */
    private $controller;

    public function setUp(){
        $factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $factory->getController(['controller' => 'sound']);
    }

    public function testIndexAction(){
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,28);
        $this->assertEquals($data[0]->subject,"حق الراعي والرعية");
        $this->assertEquals($data[1]->id,32);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(1106);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->subject,"شرح المقدمة الآجرومية - الدرس 01");
        $this->assertEquals($data->time,"1452439789");
        $this->assertEquals($data->reader->name,"محمد بن عمر بازمول");
    }
}
