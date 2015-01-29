<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 28.01.15
 * Time: 22:04
 */

namespace DesignPatterns\Creational\Singleton;


class Singleton {
    /**
     * reference to the Singleton instance
     */
    private static $instance;

    /**
     * lazy initialization (created when used)
     * @return self
     */
    public static function getInstance(){
        if(null === static::$instance){
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     * prevent call from outside, clone or unserilize
     */
    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}
}