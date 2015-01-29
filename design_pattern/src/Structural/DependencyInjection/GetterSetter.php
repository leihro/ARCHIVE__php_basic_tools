<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 09:49
 */

namespace DesignPatterns\Structural\DependencyInjection;


interface GetterSetter {
    /**
     * get the parameter config value based on the key
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * set the parameter config key value pair
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

} 