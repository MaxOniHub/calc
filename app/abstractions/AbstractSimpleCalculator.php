<?php

namespace app\abstractions;

use app\interfaces\IBaseOperations;
use app\interfaces\IResult;

/**
 * Class AbstractSimpleCalculator
 * @package abstractions
 */
abstract class AbstractSimpleCalculator extends AbstractBaseCalculator implements IBaseOperations
{
    protected $allowedOperations = ['+', '-', '*', '/'];

    protected $operand1;

    protected $operand2;

    public function setOperand1($operand1)
    {
        $this->operand1 = $operand1;
        return $this;
    }

    public function setOperand2($operand2)
    {
        $this->operand2 = $operand2;
        return $this;
    }

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function add($operand1, $operand2): IResult
    {
        $this->Result->setValue($operand1 + $operand2);
        return $this->Result;
    }

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function minus($operand1, $operand2): IResult
    {
        $this->Result->setValue($operand1 - $operand2);
        return $this->Result;
    }

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function multiply($operand1, $operand2): IResult
    {
        $this->Result->setValue($operand1 * $operand2);
        return $this->Result;
    }

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function divide($operand1, $operand2): IResult
    {
        $this->Result->setValue($operand1 / $operand2);
        return $this->Result;
    }

}