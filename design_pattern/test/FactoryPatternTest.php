<?php namespace test;

use DesignPatterns\Creational\Factory\AutoFactory;
use \PHPUnit_Framework_TestCase;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $vw = AutoFactory::createAuto('vw', 'polo');
        $this->assertEquals('vw', $vw->getAutoMaker());
        $this->assertEquals('polo', $vw->getAutomodel());
    }
}
