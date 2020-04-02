<?php

namespace app\abstractions;

use app\interfaces\IEngineeringOperations;
use app\interfaces\IResult;

/**
 * There is an example how to extend basic Calculator adding some new features
 *
 * Class AbstractSimpleCalculator
 * @package abstractions
 */
abstract class AbstractEngineeringCalculator extends AbstractBaseCalculator implements IEngineeringOperations
{
    /**
     * @var array
     */
    protected $allowedOperations = ['exp', 'abs', 'cos', 'sin'];

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


    public function validate()
    {
        if (!isset($this->operand) || (isset($this->operand) && (empty($this->operand) && $this->operand != 0))) {
            throw new \Exception("Operand is mandatory parameter!");
        }

        if (!is_numeric($this->operand)) {

            throw new \Exception("Wrong type of operand!");
        }

        if (!$this->operator || !in_array($this->operator, $this->allowedOperations)) {
            throw new \Exception("Wrong operator or operator isn't allowed");
        }
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

    public function cos($operand): IResult
    {
        $this->Result->setValue(cos($operand));
        return $this->Result;
    }

    public function sin($operand): IResult
    {
        $this->Result->setValue(sin($operand));
        return $this->Result;
    }

}