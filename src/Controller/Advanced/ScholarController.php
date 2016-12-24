<?php
namespace MirMigration\Controller\Advanced;


use MirMigration\Controller\Controller;
use MirMigration\Entity\Reader;

class ScholarController extends Controller
{
    public function indexAction(){
        $scholars = $this->getDoctrine()->getRepository(Reader::class)
            ->findAll();

        return $this->jsonResponse($scholars, 200, [], "0.1");
    }

}