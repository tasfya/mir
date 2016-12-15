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

        /** @var QuestionRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Question::class);

        $questions = $repository->findByDates(
                $request->get('date_begin', null) == null ?null: new \DateTime($request->get('date_begin')),
                $request->get('date_end', null) == null ?null: new \DateTime($request->get('date_end'))
            );
        foreach ($questions as $k => $question)
            $questions[$k] = $this->filter($question);

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

        return $this->jsonResponse($this->filter($question));
    }

    private function filter(Question $question){
        if( in_array($question->getPlace(), [0,52,42,27,64,99] ) )
            $question->setCategory(null);
        else
            $question->getCategory()->check();
        if( in_array($question->getReaderId(), [0,58] ) )
            $question->setReader(null);
        return $question;
    }

}
