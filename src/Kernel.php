<?php
namespace MirMigration;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Kernel{

    public function __construct($cache = true){
        // the cache is not implemented
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function handle(Request $request){
        return new Response();
    }

}
