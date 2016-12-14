<?php
namespace Controller;


use MirMigration\Controller\SoundController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class SoundControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var SoundController */
    private $controller;

    /** @var AppFactory $factory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'sound']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('date_begin', '2016-12-01');
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,3739);
        $this->assertEquals($data[0]->subject,'المنظومة الحائية لابن أبي داود - الدرس 09');
        $this->assertEquals($data[1]->id,3740);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(1106);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->subject,"شرح المقدمة الآجرومية - الدرس 01");
        $this->assertEquals($data->time,"1452439789");
        $this->assertEquals($data->reader->name,"محمد بن عمر بازمول");
    }
}
