<?php

namespace MirMigration\Controller;


class DefaultController extends Controller
{

    public function indexAction(){
        return $this->jsonResponse(['homepage']);
    }

    public function exampleAction($name){
        return $this->jsonResponse(["hello " . $name]);
    }

    public function example2Action(){
        return $this->jsonResponse(["example2"]);
    }

}
