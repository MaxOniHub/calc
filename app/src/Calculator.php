<?php

namespace app\src;

use app\abstractions\AbstractBaseCalculator;

/**
 * Class Calculator
 * @package src
 */
class Calculator
{
    protected $operator;

    protected $operand1;

    protected $operand2;

    /**
     * @var CalculatorManager
     */
    private $CalculatorManager;

    /**
     * Calculator constructor.
     * @param CalculatorManager $calculatorManager
     */
    public function __construct(CalculatorManager $calculatorManager)
    {
        $this->CalculatorManager = $calculatorManager;
    }

    /**
     * @param $operand1
     * @return $this
     */
    public function setOperand1($operand1)
    {
        $this->operand1 = $operand1;
        return $this;
    }

    /**
     * @param $operand2
     * @return $this
     */
    public function setOperand2($operand2)
    {
        $this->operand2 = $operand2;
        return $this;
    }

    /**
     * @param $operator
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;
        return $this;
    }

    public function calculate()
    {

        return $this->CalculatorManager->getCalculator($this->operator);

    }

    private function validateParameters()
    {

    }

    /**
     * @return AbstractBaseCalculator
     */
    private function getCalculatorBasedOnOperator()
    {
        return $this->CalculatorManager->getCalculator($this->operator);
    }


}