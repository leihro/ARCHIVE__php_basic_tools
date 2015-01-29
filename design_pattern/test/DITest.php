<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 10:25
 */

namespace test;

use DesignPatterns\Structural\DependencyInjection\App;
use DesignPatterns\Structural\DependencyInjection\Config;

class DITest extends \PHPUnit_Framework_TestCase{
    protected $config;
    protected $app;

    protected function setUp(){
        $this->config = new Config(array('user' => 'lei', 'url' => 'someurl.com'));
        $this->app = new App($this->config);
    }

    public function testDI(){
        $this->assertEquals('lei', $this->app->getUser('user'));
        $this->config->set('url', 'example.com');
        $this->assertEquals('example.com', $this->app->getUrl('url'));
    }
} 