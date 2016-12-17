<?php
namespace Controller;


use MirMigration\Controller\QuestionController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class QuestionControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var QuestionController */
    private $controller;

    /** @var AppFactory $factory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'question']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('date_begin', '2016-12-01');
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,4191);
        $this->assertEquals($data[0]->subject,'أفضل تحقيق لعلل الترمذي');
        $this->assertEquals($data[1]->id,4192);
    }

    public function testViewAction(){
        $response = $this->controller->viewAction(4196);
        $data = json_decode($response->getContent());
        $this->assertEquals($data->subject,"حكم حمل الطفل الذي يضُر نفسه في الصلاة");
        $this->assertEquals($data->created_time,"1480801537");
        $this->assertEquals($data->reader->name,'  عبد الله بن عبد الرحيم البخاري');
    }
}
