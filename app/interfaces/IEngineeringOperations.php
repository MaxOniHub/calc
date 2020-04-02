<?php

namespace app\interfaces;

/**
 * There is an example how to extend basic Calculator adding some new features
 *
 * Interface IEngineeringOperations
 * @package interfaces
 */
interface IEngineeringOperations extends IOperations
{
    public function abs($operand): IResult;

    public function exp($operand): IResult;

    public function cos($operand): IResult;

    public function sin($operand): IResult;

    //etc...
}