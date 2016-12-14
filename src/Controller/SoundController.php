<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Sound;
use MirMigration\Repository\SoundRepository;

class SoundController extends Controller
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
                $request->get('date_end', null) == null ?null: new \DateTime($request->get('date_end'))
            );
        foreach ($sounds as $k => $sound)
            $sounds[$k] = $this->filter($sound);

        return $this->jsonResponse($sounds);
    }

    /**
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewAction($id){
        /** @var Sound $sound */
        $sound = $this->getDoctrine()->getRepository(Sound::class)
            ->find($id);

        return $this->jsonResponse($this->filter($sound));
    }

    private function filter(Sound $sound){
        if( in_array($sound->getPlace(), [0 , 66] ) )
            $sound->setCategory(null);
        else
            $sound->getCategory()->check();
        if( in_array($sound->getPlace(), [0] ) )
            $sound->setReader(null);
        return $sound;
    }

}
