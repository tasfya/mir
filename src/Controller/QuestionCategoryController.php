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

        $categories = $this->getDoctrine()->getRepository(QuestionCategory::class)
            ->findBy([], $orders);

        return $this->jsonResponse($categories);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){

        $category =$this->getDoctrine()->getRepository(QuestionCategory::class)
                    ->find($id);

        return $this->jsonResponse($category);
    }


}
