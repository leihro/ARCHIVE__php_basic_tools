<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 08:21
 */

namespace DesignPatterns\Behavioral\Strategy;


class StringCompare implements CompareInterface{
    /**
     * compare two values
     * @return mixed
     */
    public function compare($a, $b)
    {
        return strcmp($a, $b);
    }

} 