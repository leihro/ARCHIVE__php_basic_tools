<?php  namespace DesignPatterns\Creational\Factory;

use DesignPatterns\Creational\Factory\Auto;

/**
 * Class AutoFactory to create auto
 * @package DesignPatterns\Factory
 */
class AutoFactory
{


    public static function createAuto($maker, $model)
    {
        return new Auto($maker, $model);
    }
}