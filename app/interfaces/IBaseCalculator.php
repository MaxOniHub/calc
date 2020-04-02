<?php

namespace app\interfaces;

/**
 * Interface IBaseCalculator
 * @package interfaces
 */
interface IBaseCalculator
{
    /**
     * @return IResult
     */
    public function getResult():IResult;

    /**
     * @param string $operator
     * @return mixed
     */
    public function setOperator(string $operator);

    /**
     * @return string
     */
    public function getOperator():string;

    /**
     * @return array
     */
    public function getAllowedOperations():array;
}