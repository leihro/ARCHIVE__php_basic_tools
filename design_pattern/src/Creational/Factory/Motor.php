<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 28.01.15
 * Time: 21:18
 */

namespace DesignPatterns\Creational\Factory;

class Motor implements VehicleInterface{
    private $motorMaker;
    private $motorMode;

    /**
     * @param $maker
     * @param $mode
     */
    public function __construct($maker, $mode){
        $this->motorMaker = $maker;
        $this->motorMode = $mode;
    }

    /**
     * get the maker of a vehicle
     * @return string
     */
    public function getMaker()
    {
        return $this->motorMaker;
    }

    /**
     * get the mode of a vehicle
     * @return string
     */
    public function getMode()
    {
        return $this->motorMode;
    }

} 