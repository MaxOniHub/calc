<?php

namespace app\src;

use app\abstractions\AbstractEngineeringCalculator;
use app\interfaces\IResult;

/**
 * Class EngineeringCalculator
 * @package src
 */
class EngineeringCalculator extends AbstractEngineeringCalculator
{
    /**
     * @return IResult
     */
    public function getResult(): IResult
    {
        switch ($this->operator)
        {
            case 'abs':
                return $this->abs($this->operand);
                break;
            case 'exp':
                return $this->exp($this->operand);
                break;

        }
    }
}