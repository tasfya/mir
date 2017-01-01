<?php
namespace MirMigration\Controller\Advanced;


use MirMigration\Controller\Controller;
use MirMigration\Entity\Sound;
use MirMigration\Entity\SoundCategory;
use MirMigration\Repository\SoundRepository;

class ExplanationController extends Controller
{
    /**
     * @param $matne_id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($matne_id){
        /** @var SoundRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Sound::class);
        $sounds = $repository->getExplanationsByMatne($matne_id);
        /*$explanations = [];
        $order = 0;
        foreach ($sounds as $sound){
            ++$order;
            /** @var Sound $sound
            $explanations[] = [
                'id' => Sound::CODE.$sound->getId(),
                'sort_number' => $order,
                'url' => 'http://miraath.net/'.str_replace('../','', $sound->getPath()),
                'scholar_id' => $sound->getReader()->getScholarId(),
                'matne_id' => SoundCategory::CODE.$matne_id,
            ];
        }*/
        /** @var Sound[] $sounds */

        return $this->jsonResponse([[
            'scholar_id' => $sounds[0]->getReader()->getScholarId(),
            'matne_id' => SoundCategory::CODE.$matne_id,
        ]]);
    }

}