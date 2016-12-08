<?php
namespace Lib;


use MirMigration\Lib\Yaml;


class YamlTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Yaml
     */
    private $yaml;

    public function setUp(){
        $this->yaml = new Yaml();
    }

    public function testLoadFile(){
        $config = $this->yaml->loadFile(__DIR__.'/test.yml');
        $this->assertEquals($config, ['test' => ['param1' => 'value1', 'param2' => 'value2']]);
    }

}
