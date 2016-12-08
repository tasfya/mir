<?php
namespace MirMigration\Controller;


use MirMigration\Lib\AppFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;

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
    public function error404Action(){
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

    /**
     * @param $name
     * @param mixed $parameters
     * @param int $referenceType
     * @return string
     */
    public function generateUrl($name, $parameters = array(), $referenceType = UrlGenerator::ABSOLUTE_PATH){
        return $this->factory->getRouting()->generateUrl($name,$parameters,$referenceType);
    }

    /**
     * @param $url
     * @param int $status
     * @param array $headers
     * @return RedirectResponse
     */
    public function redirectTo($url, $status = 302, array $headers = array()){
        return new RedirectResponse($url, $status, $headers);
    }

    /**
     * @param $name
     * @param mixed $parameters
     * @param int $referenceType
     * @param array $headers
     * @return RedirectResponse
     */
    public function redirectToRoute($name, $parameters = array(), $referenceType = UrlGenerator::ABSOLUTE_PATH, array $headers = array()){
        return $this->redirectTo($this->generateUrl($name, $parameters, $referenceType), 302, $headers);
    }

}
