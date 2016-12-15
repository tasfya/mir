<?php
namespace MirMigration\Controller;

use MirMigration\Entity\QuestionCategory;

class QuestionCategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $orders = $this->getRequest()->get('orders', ['place' => 'asc']);
        $conditions = $this->getRequest()->get('conditions', []);

        $categories = $this->getDoctrine()->getRepository(QuestionCategory::class)
            ->findBy($conditions, $orders);
        foreach ($categories as $category){
            /** @var QuestionCategory $category */
            $category->check();
        }

        return $this->jsonResponse($categories);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var QuestionCategory $category */
        $category =$this->getDoctrine()->getRepository(QuestionCategory::class)
                    ->find($id);
        $category->check();

        return $this->jsonResponse($category);
    }


}
