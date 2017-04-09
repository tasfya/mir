<?php
namespace MirMigration\Controller;

use MirMigration\Entity\PaperCategory;

class PaperCategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $conditions = $this->getRequest()->get('conditions', []);

        $categories = $this->getDoctrine()->getRepository(PaperCategory::class)
            ->findBy($conditions);
        foreach ($categories as $category){
            /** @var PaperCategory $category */
            $category->check();
        }

        return $this->jsonResponse($categories);
    }

}
