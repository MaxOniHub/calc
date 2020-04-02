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
     * @throws \Exception
     */
    public function validate()
    {

       if ((!isset($this->operand1) || empty($this->operand1)) && (!isset($this->operand2) || empty($this->operand2))) {
           throw new \Exception("At least two operands are required!");
       }

        if ((!isset($this->operand1)) || (!isset($this->operand2))) {
            throw new \Exception("At least two operands are required!");
        }

        if (!is_numeric($this->operand1) || !is_numeric($this->operand1)) {

           throw new \Exception("Wrong type of operand!");
       }

       if (!$this->operator || !in_array($this->operator, $this->allowedOperations)) {
           throw new \Exception("Wrong operator or operator isn't allowed");
       }

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
     * @throws \Exception
     */
    public function divide($operand1, $operand2): IResult
    {
        try {
            $this->Result->setValue($operand1 / $operand2);
            return $this->Result;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }


}