<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 28.01.15
 * Time: 22:12
 */

use DesignPatterns\Creational\Singleton\Singleton;

class SingletonTest extends \PHPUnit_Framework_TestCase
{
    protected $instance;

    protected function setUp(){
        $this->instance = Singleton::getInstance();
    }

    public function testSingleton()
    {
        $this->assertTrue(isset($this->instance));
    }
}