<?php

use app\builders\CalculatorBuilder;
use app\interfaces\IResult;

require_once 'vendor/autoload.php';

/** @var \app\src\Calculator $Calculator */
$Calculator = CalculatorBuilder::build();


/**
 *
 * >--------------------------------------------------------------<
 * | Demo of simple calculator (`+`, `-`, `/`, `*`)               |
 * >--------------------------------------------------------------<
 *
 */

/** @var IResult $result */
$result = $Calculator->setOperand1(2)->setOperand2(100.23)->setOperator('-')->calculate();

var_dump($result->getValue());

/**
 *
 * [-----------------------------------------------------------------]
 * | Demo of engineering calculator (`sin`, `cos`, `abs`, `exp` etc) |
 * ]-----------------------------------------------------------------[
 *
 */


/** Engineering calculator. Usage example #1 */
$result = $Calculator->setOperand1(45)->setOperator('sin')->calculate();

var_dump($result->getValue());

/** Engineering calculator. Usage example #2 */
$result = $Calculator
    ->setOperand1(45)
    ->setOperand2(23) // in this case setOperand2 will be ignored
    ->setOperator('sin')
    ->calculate();

var_dump($result->getValue());


/**
 *
 * [-----------------]
 * | Some comments   |
 * ]-----------------[
 *
 */

/**
 * There are some more different ways how to pass operands. For example:
 *
 * - instead of using setOperand1() , setOperandN() methods we can work with dynamic arguments. As result we will get something like this
 *   `
 *     setOperands(...$operands)
 *  `
 * - to pass operands as array like [1, 23, 4] and using operator `+` to get 28
 *
 * - to implement some chain of operations
 *  `
 *    setOperands([2,24], '*')->pluralOperator('+')->setOperands([1,3,4,5], '+')->pluralOperator('/')->setOperands([15,10], '-')
 *  `
 *  and to get 48 + 13 / 5 = 50.6
 *
 * but it might be done next time :)
 */





