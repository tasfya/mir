<?php
use MirMigration\AutoLoader;

require __DIR__.'/../src/AutoLoader.php';

$autoloadFile = AutoLoader::load();

if (!file_exists($autoloadFile)) {
    throw new \RuntimeException('Install dependencies to run phpunit.');
}
//require_once $autoloadFile;
