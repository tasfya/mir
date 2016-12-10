<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Category;

class CategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(){

        // @TODO : add filters, paginations

        $orders = $this->getRequest()->get('orders', ['place' => 'asc']);

        $categories = $this->getDoctrine()->getRepository(Category::class)
            ->findBy([], $orders);

        return $this->jsonResponse($categories);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function viewAction($id){

        $category =$this->getDoctrine()->getRepository(Category::class)
                    ->find($id);

        return $this->jsonResponse($category);
    }


}
