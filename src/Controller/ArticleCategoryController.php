<?php
namespace MirMigration\Controller;

use MirMigration\Entity\ArticleCategory;
use MirMigration\Entity\BookCategory;

class ArticleCategoryController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $categories = $this->getDoctrine()->getRepository(ArticleCategory::class)
            ->findAll();
        foreach ($categories as $category){
            /** @var BookCategory $category */
            $category->check();
        }

        return $this->jsonResponse($categories);
    }

}
