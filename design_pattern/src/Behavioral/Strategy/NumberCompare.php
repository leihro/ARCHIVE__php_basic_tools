<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 08:24
 */

namespace DesignPatterns\Behavioral\Strategy;


class NumberCompare implements CompareInterface{
    /**
     * compare two values
     * @return mixed
     */
    public function compare($a, $b)
    {
        return $a > $b ? 1 : -1;
    }

} 