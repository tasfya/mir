<?php
namespace Controller;


use MirMigration\Controller\ArticleController;
use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\Request;


class ArticleControllerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ArticleController */
    private $controller;

    /** @var AppFactory $factory */
    private $factory;

    public function setUp(){
        $this->factory = new AppFactory(Request::createFromGlobals(), 'prod');
        $this->controller = $this->factory->getController(['controller' => 'article']);
    }

    public function testIndexAction(){
        $this->factory->getRequest()->query->set('date_begin', '2016-11-01');
        $this->factory->getRequest()->query->set('date_end', '2016-11-05');
        $response = $this->controller->indexAction();
        $data = json_decode($response->getContent());
        $this->assertEquals($data[0]->id,6662436);
        $this->assertEquals($data[0]->subject,'تأمل هذه النعم العظيمة');
        $this->assertEquals($data[1]->id,6662437);
    }
}
