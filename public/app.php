<?php
use Symfony\Component\HttpFoundation\Request;
use MirMigration\Kernel;

$loader = require __DIR__.'/../vendor/autoload.php';

$request = Request::createFromGlobals();

$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
