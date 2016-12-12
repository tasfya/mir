<?php
use MirMigration\Kernel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class KernelTest extends PHPUnit_Framework_TestCase
{

    public function testHandle(){
        $request = Request::createFromGlobals();
        $kernel = new Kernel('prod');
        $this->assertEquals(true, $kernel->handle($request) instanceof Response );
    }

}
