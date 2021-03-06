<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 28.01.15
 * Time: 21:23
 */

namespace DesignPatterns\Creational\Factory;

class Auto implements VehicleInterface{
    private $autoMaker;
    private $autoMode;

    /**
     * @param $maker
     * @param $mode
     */
    public function __construct($maker, $mode){
        $this->autoMaker = $maker;
        $this->autoMode = $mode;
    }

    /**
     * get the maker of a vehicle
     * @return string
     */
    public function getMaker()
    {
        return $this->autoMaker;
    }

    /**
     * get the mode of a vehicle
     * @return string
     */
    public function getMode()
    {
        return $this->autoMode;
    }

} 