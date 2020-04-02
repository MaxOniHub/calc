<?php

namespace app\src;

use app\interfaces\IResult;

/**
 * Class Result
 * @package src
 */
class Result implements IResult
{
    private $value;

    public function setValue($number)
    {
        $this->value = $number;
    }

    public function getValue()
    {
        return $this->value;
    }
}