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
    ->setOperand1(2)
    ->setOperand2(100.23)


    ->setOperator('-')

    ->calculate();

var_dump($result->getValue());

