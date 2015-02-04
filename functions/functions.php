<?php

class Util
{

    /**
     * commonly used functions
     */

    /*------------------------------------------------------
        STRING
    -------------------------------------------------------*/

    /**
     * check a string if needle is in the haystack
     * @param  string $haystack
     * @param  mixed $needle
     * @return boolean
     */
    public function in_string($haystack, $needle)
    {
        if (strpos($haystack, $needle) === false) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * check $str starts with $sub
     * @param  string $str
     * @param  string $sub
     * @return boolean
     */
    public function start_with($str, $sub)
    {
        return (substr($str, 0, strlen($sub)) === $sub);
    }

    /**
     * check $str ends with $sub
     * @param  string $str
     * @param  string $sub
     * @return boolean
     */
    public function end_with($str, $sub)
    {
        return (substr($str, strlen($str) - strlen($sub)) === $sub);
    }

    /**
     * explode with multi delimiters
     * @param  string $delimiters
     * @param  string $str string to be exploded
     * @return array             string after exploded
     */
    public function multi_explode($delimiters, $str)
    {
        $replaceStr = str_replace($delimiters, $delimiters[0], $str);
        $result = explode($delimiters[0], $replaceStr);
        return $result;
    }

    /**
     * count diff chars in a string and sort them in an array
     * @param  [type] $str
     * @return [type]
     */
    public function count_sort_char_in_string($str)
    {
        $arr = str_split($str);
        $count_arr = array_count_values($arr);
        arsort($count_arr);
        return $count_arr;
    }


    /*------------------------------------------------------
        ARRAY
    -------------------------------------------------------*/

    /**
     * sort values in an array
     * @param  mixed $array
     * @return
     */
    public function sort_array($array, $type = "des")
    {
        switch ($type) {
            case 'des':
                if (is_numeric($array[0])) {
                    usort($array, function ($a, $b) {
                        return (($a > $b) ? -1 : 1);
                    });
                } elseif (is_string($array[0])) {
                    usort($array, function ($a, $b) {
                        return strcmp($b, $a);
                    });
                }
                break;
            case 'asc':
                if (is_numeric($array[0])) {
                    usort($array, function ($a, $b) {
                        return (($a > $b) ? 1 : -1);
                    });
                } elseif (is_string($array[0])) {
                    usort($array, function ($a, $b) {
                        return strcmp($a, $b);
                    });
                }
                break;
            default:
                break;

        }

        return $array;
    }


}

?>