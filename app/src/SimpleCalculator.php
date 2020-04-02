<?php

namespace app\src;

use app\abstractions\AbstractSimpleCalculator;
use app\interfaces\IResult;

/**
 * Class SimpleCalculator
 * @package src
 */
class SimpleCalculator extends AbstractSimpleCalculator
{
    /**
     * @return IResult
     * @throws \Exception
     */
    public function process(): IResult
    {
        switch ($this->operator)
        {
            case '+':
                return $this->add($this->operand1, $this->operand2);
                break;
            case '-':
                return $this->minus($this->operand1, $this->operand2);
                break;
            case '*':
                return $this->multiply($this->operand1, $this->operand2);
                break;
            case '/':
                return $this->divide($this->operand1, $this->operand2);
                break;
        }

    }

}