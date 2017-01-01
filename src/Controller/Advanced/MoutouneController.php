<?php
namespace MirMigration\Controller\Advanced;


use MirMigration\Controller\Controller;
use MirMigration\Entity\SoundCategory;

class MoutouneController extends Controller
{
    public function indexAction(){
        /** @var SoundCategory $category */
        $category = $this->getDoctrine()->getRepository(SoundCategory::class)
            ->find(3);
        $category->check();

        return $this->jsonResponse($category->getMoutounes(), 200, [], "0.1");
    }

}