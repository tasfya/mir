<?php
namespace MirMigration\Lib;


class Yaml
{

    public function loadFile($file){
        return \Symfony\Component\Yaml\Yaml::parse(file_get_contents($file));
    }

}