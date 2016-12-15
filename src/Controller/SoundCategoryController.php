<?php
namespace MirMigration\Controller;

use MirMigration\Entity\SoundCategory;

class SoundCategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $conditions = $this->getRequest()->get('conditions', []);
        $categories = $this->getDoctrine()->getRepository(SoundCategory::class)
            ->findBy($conditions);
        foreach ($categories as $category){
            /** @var SoundCategory $category */
            $category->check();
        }

        return $this->jsonResponse($categories);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var SoundCategory $category */
        $category =$this->getDoctrine()->getRepository(SoundCategory::class)
                    ->find($id);
        $category->check();

        return $this->jsonResponse($category);
    }


}
