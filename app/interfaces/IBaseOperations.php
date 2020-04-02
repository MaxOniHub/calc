<?php

namespace app\interfaces;

/**
 * Interface IBaseOperations
 * @package interfaces
 */
interface IBaseOperations extends IOperations
{
    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function add($operand1, $operand2):IResult;

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function minus($operand1, $operand2):IResult;

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function divide($operand1, $operand2):IResult;

    /**
     * @param $operand1
     * @param $operand2
     * @return IResult
     */
    public function multiply($operand1, $operand2):IResult;
}