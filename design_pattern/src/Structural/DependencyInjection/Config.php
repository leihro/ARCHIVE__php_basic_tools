<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 09:48
 */

namespace DesignPatterns\Structural\DependencyInjection;


class Config extends AbstractConfig implements GetterSetter{
    /**
     * get the parameter config value based on the key
     * @param $key
     * @return mixed
     */
    public function get($key)
    {
        return $this->aParameters[$key];
    }

    /**
     * set the parameter config key value pair
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $this->aParameters[$key] = $value;
    }

} 