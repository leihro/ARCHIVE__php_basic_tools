<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 08:19
 */

namespace DesignPatterns\Behavioral\Strategy;


interface CompareInterface {
    /**
     * compare two values
     * @return mixed
     */
    public function compare($a, $b);
} 