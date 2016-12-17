<?php


namespace MirMigration\Controller;


use MirMigration\Entity\BookDischarge;
use MirMigration\Repository\BookDischargeRepository;

class BookDischargeController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $request = $this->getRequest();

        /** @var BookDischargeRepository $repository */
        $repository = $this->getDoctrine()->getRepository(BookDischarge::class);

        $books = $repository->findByDates(
            $request->get('date_begin', null) == null ? null
                : new \DateTime($request->get('date_begin')),
            $request->get('date_end', null) == null ? null
                : new \DateTime($request->get('date_end'))
        );
        foreach ($books as $k => $book){
            /** @var BookDischarge $book */
            $book->check();
        }

        return $this->jsonResponse($books);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var BookDischarge $book */
        $book = $this->getDoctrine()->getRepository(BookDischarge::class)
            ->find($id);
        $book->check();

        return $this->jsonResponse($book);
    }

}