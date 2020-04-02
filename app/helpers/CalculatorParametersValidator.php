<?php

namespace app\helpers;

/**
 * Class CalculatorParametersValidator
 * @package app\exceptions
 */
class CalculatorParametersValidator
{
    /**
     * @param $value
     * @return bool
     */
    public static function checkIfNumber($value)
    {
        return is_numeric($value);
    }
}