<?php
namespace MirMigration\Controller;


use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerBuilder;
use MirMigration\Lib\AppFactory;
use MirMigration\Lib\Doctrine\Doctrine;
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
     * @return Doctrine
     */
    public function getDoctrine(){
        return $this->factory->getDoctrine();
    }

    /**
     * @param mixed|null $data
     * @param int $status
     * @param array $headers
     * @param int|null $version
     * @return Response
     */
    public function jsonResponse($data = null, $status = 200, $headers = array(), $version = null){
        $headers['Content-Type'] = 'application/json';
        $serializer = SerializerBuilder::create()->build();
        if( $version == null ) $data = $serializer->serialize($data, 'json');
        else $data = $serializer->serialize($data, 'json', SerializationContext::create()->setVersion($version));
        return new Response($data, $status, $headers);
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
