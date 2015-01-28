<?php namespace test;

use DesignPatterns\Creational\Factory\VehicleFactory;
use \PHPUnit_Framework_TestCase;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    protected $factory;

    protected function setUp(){
        $this->factory = new VehicleFactory();
    }

    public function testFactory()
    {
        $vw = $this->factory->createVehicle('auto', 'vw', 'polo');
        $this->assertEquals('vw', $vw->getMaker());
        $this->assertEquals('polo', $vw->getMode());

        $bmw = $this->factory->createVehicle('motor', 'bmw', 's');
        $this->assertEquals('bmw', $bmw->getMaker());
        $this->assertEquals('s', $bmw->getMode());
    }
}
