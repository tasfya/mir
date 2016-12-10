<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

use Symfony\Component\HttpFoundation\Request;
use MirMigration\Kernel;
use MirMigration\AutoLoader;

require __DIR__.'/../src/AutoLoader.php';

$loader = AutoLoader::load();

$request = Request::createFromGlobals();

$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();
