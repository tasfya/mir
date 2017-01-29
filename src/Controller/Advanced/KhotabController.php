<?php
namespace MirMigration\Controller\Advanced;

use MirMigration\Controller\Controller;
use MirMigration\Entity\Sound;
use MirMigration\Repository\SoundRepository;

class KhotabController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $request = $this->getRequest();

        /** @var SoundRepository $repository */
        $repository = $this->getDoctrine()->getRepository(Sound::class);

        $sounds = $repository->findByDates(
                $request->get('date_begin', null) == null ?null: new \DateTime($request->get('date_begin')),
                $request->get('date_end', null) == null ?null: new \DateTime($request->get('date_end')),
                7
            );
        $khotabs = array();
        foreach ($sounds as $k => $sound){
            /** @var Sound $sound */
            $khotabs[] = [
                'id' => $sound->getId(),
                'url' => 'http://miraath.net/'.str_replace('../','', $sound->getPath()),
                'title' => $sound->getSubject(),
                'description' => $sound->getDescription(),
                'timestamp' => $sound->getDateTimestamp(),
                'scholar_id' => $sound->getReader()->getScholarId(),
            ];
        }

        return $this->jsonResponse($khotabs);
    }

}
