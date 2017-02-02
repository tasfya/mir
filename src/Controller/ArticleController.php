<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Article;
use MirMigration\Repository\ArticleRepository;

class ArticleController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $request = $this->getRequest();

        /** @var ArticleRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repository->findByDates(
            $request->get('date_begin', null) == null ? null
                : new \DateTime($request->get('date_begin')),
            $request->get('date_end', null) == null ? null
                : new \DateTime($request->get('date_end'))
        );

        foreach ($articles as $article){
            /** @var Article $article */
            $article->check();
        }

        return $this->jsonResponse($articles);
    }

}
