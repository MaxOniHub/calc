<?php

namespace app\src;

use app\abstractions\AbstractBaseCalculator;
use app\abstractions\AbstractEngineeringCalculator;
use app\abstractions\AbstractSimpleCalculator;
use app\exceptions\WrongOperatorException;
use app\helpers\CalculatorParametersValidator;
use app\interfaces\IResult;

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

    /** @var AbstractBaseCalculator $Calculator */
    private $Calculator;

    /** @var CalculatorParametersValidator  */
    private $Validator;

    /**
     * Calculator constructor.
     * @param CalculatorManager $calculatorManager
     * @param CalculatorParametersValidator $validator
     */
    public function __construct(CalculatorManager $calculatorManager, CalculatorParametersValidator $validator)
    {
        $this->CalculatorManager = $calculatorManager;
        $this->Validator = $validator;
    }

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

    /**
     * @return AbstractBaseCalculator
     */
    public function getCalculator()
    {
       return $this->Calculator;
    }

    /**
     * @return IResult
     * @throws WrongOperatorException
     */
    public function calculate()
    {
        $this->Calculator = $this->CalculatorManager->getCalculator($this->operator);

        if ($this->CalculatorManager->isSimpleCalculator($this->Calculator)) {
            return $this->useSimpleCalculator($this->Calculator);
        }

        if ($this->CalculatorManager->isEngineeringCalculator($this->Calculator)) {
            return $this->useEngineeringCalculator($this->Calculator);
        }

    }

    /**
     * @param AbstractBaseCalculator $Calculator
     * @return IResult
     */
    private function useSimpleCalculator(AbstractBaseCalculator $Calculator)
    {
        /** @var AbstractSimpleCalculator $Calculator */
        return $Calculator
            ->setOperand1($this->operand1)
            ->setOperand2($this->operand2)
            ->setOperator($this->operator)
            ->getResult();
    }

    /**
     * @param AbstractBaseCalculator $Calculator
     * @return IResult
     */
    private function useEngineeringCalculator(AbstractBaseCalculator $Calculator)
    {
        /** @var AbstractEngineeringCalculator $Calculator */
        return $Calculator
            ->setOperand($this->operand1)
            ->setOperator($this->operator)
            ->getResult();
    }

}