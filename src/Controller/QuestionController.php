<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Question;
use MirMigration\Repository\QuestionRepository;

class QuestionController extends Controller{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $request = $this->getRequest();

        $page = $request->query->get('page', 1);
        $offset = ($page - 1) * 20;

        /** @var QuestionRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Question::class);

        /**$questions = $repository->findByDates(
                $request->get('date_begin', null) == null ?null: new \DateTime($request->get('date_begin')),
                $request->get('date_end', null) == null ?null: new \DateTime($request->get('date_end'))
            );**/
        $questions = $repository->findBy([], [], 20, $offset);
        foreach ($questions as &$question){
            /** @var Question $question */
            $question->check();
        }

        return $this->jsonResponse($questions);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var Question $question */
        $question = $this->getDoctrine()->getRepository(Question::class)
            ->find($id);
        $question->check();

        return $this->jsonResponse($question);
    }

}
