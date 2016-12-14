<?php
namespace MirMigration\Controller;

use MirMigration\Entity\Sound;

class SoundController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(){

        $sounds = $this->getDoctrine()->getRepository(Sound::class)
            ->findAll();
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
        if( in_array($sound->getPlace(), [0] ) )
            $sound->setReader(null);
        return $sound;
    }

}
