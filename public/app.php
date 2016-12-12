<?php

use Symfony\Component\HttpFoundation\Request;
use MirMigration\Kernel;
use MirMigration\AutoLoader;

require __DIR__.'/../src/AutoLoader.php';

$loader = AutoLoader::load();

$request = Request::createFromGlobals();

$kernel = new Kernel('prod');
$response = $kernel->handle($request);
$response->send();
