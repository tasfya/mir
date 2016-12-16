<?php
namespace MirMigration\Controller;


use MirMigration\Entity\Book;
use MirMigration\Repository\BookRepository;

class BookController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $request = $this->getRequest();

        /** @var BookRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Book::class);

        $books = $repository->findByDates(
            $request->get('date_begin', null) == null ? null
                : new \DateTime($request->get('date_begin')),
            $request->get('date_end', null) == null ? null
                : new \DateTime($request->get('date_end'))
        );
        /**foreach ($books as $k => $book){
            /** @var Book $book
            $question->check();
        } */

        return $this->jsonResponse($books);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var Book $book */
        $book = $this->getDoctrine()->getRepository(Book::class)
            ->find($id);
        //$book->check();

        return $this->jsonResponse($book);
    }

}
