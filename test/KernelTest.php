<?php
use App\Kernel;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class KernelTest extends PHPUnit_Framework_TestCase
{

    public function testHandle(){
        $request = Request::createFromGlobals();
        $kernel = new Kernel();
        $this->assertEquals(Response::class, get_class($kernel->handle($request)));
    }

}
