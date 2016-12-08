<?php
namespace MirMigration\Lib;


class Yaml
{

    /**
     * @param $file
     * @return mixed
     */
    public function loadFile($file){
        return \Symfony\Component\Yaml\Yaml::parse(file_get_contents($file));
    }

}
