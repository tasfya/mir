<?php
/**
 * Created by PhpStorm.
 * User: hamza
 * Date: 07/12/16
 * Time: 11:06 ص
 */


use App\Kernel;


class KernelTest extends PHPUnit_Framework_TestCase
{
    private $request;
    private $kernel;

    public function setUp()
    {
        $this->request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $this->kernel = new Kernel();
    }

}
