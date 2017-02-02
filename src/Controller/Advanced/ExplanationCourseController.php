<?php
namespace MirMigration\Controller\Advanced;


use MirMigration\Controller\Controller;
use MirMigration\Entity\Sound;
use MirMigration\Entity\SoundCategory;
use MirMigration\Repository\SoundRepository;

class ExplanationCourseController extends Controller
{
    /**
     * @param $matne_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($explanation_id){
        /** @var SoundRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Sound::class);
        $sounds = $repository->getExplanationsByMatne($explanation_id);
        $explanations = [];
        $order = 0;
        foreach ($sounds as $sound){
            ++$order;
            /** @var Sound $sound */
            $explanations[] = [
                'id' => $sound->getId(),
                'sort_number' => $order,
                'url' => 'http://old.miraath.net/'.str_replace('../','', $sound->getPath()),
            ];
        }

        return $this->jsonResponse($explanations, 200, [], "0.1");
    }

    public function allAction(){
        $request = $this->getRequest();
        /** @var SoundCategory $category */
        $category = $this->getDoctrine()->getRepository(SoundCategory::class)
            ->find(3);
        $category->check();
        $moutounes = $category->getMoutounes();

        /** @var SoundRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Sound::class);
        $all_sounds = $repository->getExplanations($moutounes, $request->query->get('begin', null),
            $request->query->get('end', null));

        $sounds = array();
        $explanation_id = null;
        $order = 0;
        foreach ($all_sounds as $sound){
            /** @var Sound $sound */
            if( $explanation_id != $sound->getExplanationId() ){
                $order = 0;
                $explanation_id = $sound->getExplanationId();
            }
            $order++;
            $sounds[] =  [
                'id' => $sound->getId(),
                'old_id' => $sound->getOldId(),
                'explanation_id' => $sound->getExplanationId(),
                'sort_number' => $order,
                'url' => 'http://old.miraath.net/'.str_replace('../','', $sound->getPath()),
            ];
        }

        return $this->jsonResponse($sounds);
    }

}
