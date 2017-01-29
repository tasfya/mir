<?php
namespace MirMigration\Controller\Advanced;


use MirMigration\Controller\Controller;
use MirMigration\Entity\Sound;
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
                'url' => 'http://miraath.net/'.str_replace('../','', $sound->getPath()),
            ];
        }

        return $this->jsonResponse($explanations, 200, [], "0.1");
    }

}
