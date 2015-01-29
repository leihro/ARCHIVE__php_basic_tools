<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 09:49
 */

namespace DesignPatterns\Structural\DependencyInjection;


class AbstractConfig {
    /**
     * @var config parameter array
     */
    protected $aParameters;

    /**
     * @param $param
     */
    public function __construct($param){
        $this->aParameters = $param;
    }
} 