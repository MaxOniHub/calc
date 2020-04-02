<?php

namespace app\abstractions;

use app\interfaces\IBaseCalculator;
use app\interfaces\IResult;

/**
 * Class AbstractBaseCalculator
 * @package abstractions
 */
abstract class AbstractBaseCalculator implements IBaseCalculator
{
    /**
     * @var string[] e.g. '+', '-' or 'mod', 'abs', 'exp' etc
     */
    protected $allowedOperations = [];

    /** @var string */
    protected $operator;

    /**
     * @var IResult
     */
    protected $Result;

    /**
     * AbstractSimpleCalculator constructor.
     * @param IResult $result
     */
    public function __construct(IResult $result)
    {
        $this->Result = $result;
    }

    /**
     * @return IResult
     */
    public function getResult(): IResult
    {
        $this->validate();

        return $this->process();
    }

    /**
     * @return IResult
     */
    abstract protected function process():IResult;

    /**
     * @return array
     */
    public function getAllowedOperations(): array
    {
        return $this->allowedOperations;
    }

    /**
     * @param string $operator
     * @return AbstractBaseCalculator
     */
    public function setOperator(string $operator)
    {
       $this->operator = $operator;
       return $this;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * Custom validation rules for each type of calculator
     */
    abstract public function validate();
}