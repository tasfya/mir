<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Reader;

class ReaderController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $readers = $this->getDoctrine()->getRepository(Reader::class)
            ->findAll();

        return $this->jsonResponse($readers);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){

        $reader =$this->getDoctrine()->getRepository(Reader::class)
                    ->find($id);

        return $this->jsonResponse($reader);
    }


}
