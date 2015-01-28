<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 28.01.15
 * Time: 21:19
 */

namespace DesignPatterns\Creational\Factory;


interface VehicleInterface {
    /**
     * get the maker of a vehicle
     * @return string
     */
    public function getMaker();

    /**
     * get the mode of a vehicle
     * @return string
     */
    public function getMode();

} 