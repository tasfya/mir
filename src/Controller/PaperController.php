<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Paper;

class PaperController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $conditions = $this->getRequest()->get('conditions', []);

        $papers = $this->getDoctrine()->getRepository(Paper::class)
            ->findBy($conditions);
        foreach ($papers as $paper){
            /** @var Paper $paper */
            $paper->check();
        }

        return $this->jsonResponse($papers);
    }

}
