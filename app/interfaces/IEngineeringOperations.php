<?php

namespace app\interfaces;

/**
 * There is an example how to extend basic Calculator
 * Interface IEngineeringOperations
 * @package interfaces
 */
interface IEngineeringOperations extends IOperations
{
    public function abs($operand):IResult;

    public function exp($operand): IResult;

    //etc...
}