<?php
namespace MirMigration\Controller;

use MirMigration\Entity\BookCategory;

class BookCategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $conditions = $this->getRequest()->get('conditions', []);

        $categories = $this->getDoctrine()->getRepository(BookCategory::class)
            ->findBy($conditions);
        foreach ($categories as $category){
            /** @var BookCategory $category */
            $category->check();
        }

        return $this->jsonResponse($categories);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var BookCategory $category */
        $category =$this->getDoctrine()->getRepository(BookCategory::class)
            ->find($id);
        $category->check();

        return $this->jsonResponse($category);
    }

}
