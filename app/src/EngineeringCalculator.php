<?php

namespace app\src;

use app\abstractions\AbstractEngineeringCalculator;
use app\interfaces\IResult;

/**
 * There is an example how to extend basic Calculator adding some new features
 *
 * Class EngineeringCalculator
 * @package src
 */
class EngineeringCalculator extends AbstractEngineeringCalculator
{
    /**
     * @return IResult
     */
    public function process(): IResult
    {
        switch ($this->operator) {
            case 'abs':
                return $this->abs($this->operand);
                break;
            case 'exp':
                return $this->exp($this->operand);
                break;
            case 'cos':
                return $this->cos($this->operand);
                break;
            case 'sin':
                return $this->sin($this->operand);
                break;

        }
    }
}