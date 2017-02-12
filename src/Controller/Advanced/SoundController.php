<?php
namespace MirMigration\Controller\Advanced;

use MirMigration\Controller\Controller;
use MirMigration\Entity\Sound;
use MirMigration\Entity\SoundCategory;
use MirMigration\Repository\SoundRepository;

class SoundController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function khotabsAction(){
        return $this->getSounds(Sound::KHOTABE, 7);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function mohadaratesAction(){
        return $this->getSounds(Sound::MOHADARATE, 4);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function salasilesAction(){
        return $this->getSounds(Sound::SALASILE, 9, true);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function liqaatesAction(){
        return $this->getSounds(Sound::LIQAATE, 17, true);
    }

    private function getSounds($code, $category, $with_category  = false){
        $request = $this->getRequest();
        /** @var SoundRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Sound::class);
        $all = $repository->findByDates(
            $request->get('date_begin', null) == null ?null: new \DateTime($request->get('date_begin')),
            $request->get('date_end', null) == null ?null: new \DateTime($request->get('date_end')),
            $category
        );
        $sounds = array();
        foreach ($all as $k => $sound){
            /** @var Sound $sound */
            $data = [
                'id' => $code.$sound->getOldId(),
                'old_id' => $sound->getOldId(),
                'url' => 'http://old.miraath.net/'.str_replace('../','', $sound->getPath()),
                'title' => $sound->getSubject(),
                'description' => $sound->getDescription(),
                'timestamp' => $sound->getDateTimestamp(),
                'scholar_id' => $sound->getReader()->getScholarId(),
                'scholar_name' => $sound->getReader()->getName(),
            ];
            if( $with_category ){
                $data['category_id'] = SoundCategory::CODE.$sound->getCategory()->getId();
                $data['category_name'] = $sound->getCategory()->getName();
            }
            $sounds[] = $data;
        }

        return $this->jsonResponse($sounds);
    }

}
