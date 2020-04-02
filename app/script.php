<?php

use app\builders\CalculatorBuilder;
use app\interfaces\IResult;

require_once 'vendor/autoload.php';

/** @var \app\src\Calculator $Calculator */
$Calculator = CalculatorBuilder::build();

/**
 * @var IResult $result
 */
$result = $Calculator
    ->setOperator(13.00)
    ->setOperand2(2)
    ->setOperator('abs')
    ->calculate();

var_dump($result->getValue());

