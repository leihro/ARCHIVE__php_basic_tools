<?php
/**
 * Created by PhpStorm.
 * User: lei
 * Date: 29.01.15
 * Time: 08:25
 */

namespace DesignPatterns\Behavioral\Strategy;


class ArrayCompare {
    private $comparator;

    /**
     * @param $array
     * @return mixed
     */
    public function sort($array){
        if(!$this->comparator){
            throw new \LogicException("Comparator is not set");
        }

        usort($array, array($this->comparator, 'compare'));
        return $array;
    }

    /**
     * @param CompareInterface $comparator
     */
    public function setComparator(CompareInterface $comparator){
        $this->comparator = $comparator;
    }
} 