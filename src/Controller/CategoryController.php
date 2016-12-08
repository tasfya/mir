<?php
namespace MirMigration\Controller;

class CategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(){

        $orders = $this->getRequest()->get('orders', ['place' => 'asc']);

        $query = $this->getDoctrine()->createQueryBuilder()
            ->select('*')
            ->from('category');

        foreach ($orders as $sort => $order){
            $query->addOrderBy($sort, $order);
        }

        $categories = $query->execute()->fetchAll();

        return $this->jsonResponse($categories);
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function viewAction($id){

        $category = $this->getDoctrine()->createQueryBuilder()
            ->select('*')
            ->from('category')
            ->where('id = :id')
            ->setParameter('id', $id)
            ->execute()->fetch();

        return $this->jsonResponse($category);
    }


}
