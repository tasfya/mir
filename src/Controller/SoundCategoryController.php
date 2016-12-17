<?php
namespace MirMigration\Controller;

use MirMigration\Entity\SoundCategory;

class SoundCategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $categories = $this->getDoctrine()->getRepository(SoundCategory::class)
            ->findAll();

        return $this->jsonResponse($categories);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){

        $category =$this->getDoctrine()->getRepository(SoundCategory::class)
                    ->find($id);

        return $this->jsonResponse($category);
    }


}
