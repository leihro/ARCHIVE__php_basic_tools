<?php
namespace DesignPatterns\Creational\Factory;

/**
 * Class VehicleFactory
 * @package DesignPatterns\Creational\Factory
 */
class VehicleFactory{
    /**
     * @var array of types
     */
    private $aType;

    public function __construct(){
        $this->aType = array(
            'auto' => __NAMESPACE__ . '\Auto',
            'motor' => __NAMESPACE__ . '\Motor'
        );
    }

    public function createVehicle($type, $maker, $mode)
    {
        $classname = $this->aType[$type];
        return new $classname($maker, $mode);
    }
}