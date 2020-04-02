<?php

namespace app\abstractions;

use app\interfaces\IEngineeringOperations;
use app\interfaces\IResult;

/**
 * Class AbstractSimpleCalculator
 * @package abstractions
 */
abstract class AbstractEngineeringCalculator extends AbstractBaseCalculator implements IEngineeringOperations
{
    /**
     * @var array
     */
    protected $allowedOperations = ['mod', 'exp', 'abs'];

    protected $operand;

    /**
     * @param $operand
     * @return $this
     */
    public function setOperand($operand)
    {
        $this->operand = $operand;
        return $this;
    }

    /**
     * @param $operand
     * @return IResult
     */
    public function abs($operand): IResult
    {
        $this->Result->setValue(abs($operand));
        return $this->Result;
    }

    /**
     * @param $operand
     * @return IResult
     */
    public function exp($operand): IResult
    {
        $this->Result->setValue(exp($operand));
        return $this->Result;
    }

}