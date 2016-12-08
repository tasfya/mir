<?php
namespace MirMigration\Controller;


use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    protected $factory;

    /**
     * Controller constructor.
     * @param AppFactory $factory
     */
    public function __construct(AppFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Response
     */
    public function error404(){
        return new Response("Not found", 404);
    }

    /**
     * @return Request
     */
    public function getRequest(){
        return $this->factory->getRequest();
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
