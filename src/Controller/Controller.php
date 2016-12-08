<?php
namespace MirMigration\Controller;


use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    protected $request;
    protected $factory;

    public function __construct(AppFactory $factory, Request $request)
    {
        $this->factory = $factory;
        $this->request = $request;
    }

    public function error404(){
        return new Response("Not found", 404);
    }

    /**
     * @return Request
     */
    public function getRequest(){
        return $this->request;
    }

    /**
     * @return \Doctrine\DBAL\Connection
     */
    public function getDoctrine(){
        return $this->factory->getDoctrine();
    }

    /**
     * @param mixed|null $data
     * @param int $status
     * @param array $headers
     * @param bool $json
     */
    public function jsonResponse($data = null, $status = 200, $headers = array(), $json = false){
        return new JsonResponse($data, $status, $headers, $json);
    }

}