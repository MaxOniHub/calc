<?php

namespace app\tests\unit;

use app\abstractions\AbstractEngineeringCalculator;
use app\abstractions\AbstractSimpleCalculator;
use app\builders\CalculatorBuilder;
use app\exceptions\WrongOperatorException;
use app\interfaces\IResult;
use app\src\Calculator;
use Codeception\AssertThrows;

class CalculatorTest extends \Codeception\Test\Unit
{

    use AssertThrows;


    // tests
    public function testIfProperCalculatorWasChosenByOperator()
    {
        /**
         * =============================
         * Check simple calculator
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1(1)->setOperand2(2)->setOperator('+')->calculate();

        $this->assertEquals(AbstractSimpleCalculator::class, get_parent_class($Calculator->getCalculator()));

        /**
         * =============================
         * Check Engineering calculator
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1(23)->setOperator('exp')->calculate();

        $this->assertEquals(AbstractEngineeringCalculator::class, get_parent_class($Calculator->getCalculator()));

        /**
         * =============================
         * A wrong operator was provided
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1(23)->setOperator('fake operator');

        $this->assertThrows(WrongOperatorException::class, function() use($Calculator) {
            $Calculator->calculate();
        });

    }

    /**
     *
     * Simple Calculator. Check input parameters
     *
     * @throws \Exception
     */
    public function testParameterValidationOfSimpleCalculator()
    {

        /**
         * =============================
         * Empty operands check
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1("")->setOperand2("")->setOperator("+");

        $this->assertThrowsWithMessage(\Exception::class, 'At least two operands are required!', function() use($Calculator) {
            $Calculator ->calculate();
        });

        /**
         * =============================
         * Empty operands and operator check
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1("")->setOperand2("")->setOperator("");

        $this->assertThrows(WrongOperatorException::class, function() use($Calculator) {
            $Calculator ->calculate();
        });

        /**
         * =============================
         * setOperand2() was missed
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1(23)->setOperator("+");

        $this->assertThrowsWithMessage(\Exception::class,'At least two operands are required!', function() use($Calculator) {
            $Calculator->calculate();
        });

        /**
         * =============================
         * setOperator() was missed
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1(23)->setOperand2(15);

        $this->assertThrows(WrongOperatorException::class, function() use($Calculator) {
            $Calculator->calculate();
        });

        /**
         * =============================
         * setOperand1(), setOperand2(), setOperator() were missed
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();

        $this->assertThrows(WrongOperatorException::class, function() use($Calculator) {
            $Calculator->calculate();
        });


    }

    /**
     *
     * Engineering Calculator. Check input parameters
     *
     * @throws \Exception
     */
    public function testParameterValidationOfEngineeringCalculator()
    {
        /**
         * =============================
         * Empty operands check
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1("")->setOperator("sin");

        $this->assertThrowsWithMessage(\Exception::class, 'Wrong type of operand!', function() use($Calculator) {
            $Calculator ->calculate();
        });

        /**
         * =============================
         * Empty operands and operator check
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1("")->setOperator("");

        $this->assertThrows(WrongOperatorException::class, function() use($Calculator) {
            $Calculator ->calculate();
        });

        /**
         * =============================
         * setOperand1() was missed
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperator("sin");

        $this->assertThrowsWithMessage(\Exception::class, 'Operand is mandatory parameter!', function() use($Calculator) {
            $Calculator ->calculate();
        });

        /**
         * =============================
         * setOperand1(), setOperator() were missed
         * =============================
         */

        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();

        $this->assertThrows(WrongOperatorException::class, function() use($Calculator) {
            $Calculator->calculate();
        });

    }

    /**
     * Check if calculations are correct
     *
     * @throws WrongOperatorException
     */
    public function testCalculations()
    {
        /**
         * =============================
         * Check division by zero error
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();
        $Calculator->setOperand1(100)->setOperand2(0)->setOperator('/');

        $this->assertThrowsWithMessage(\Exception::class,'Division by zero', function() use($Calculator) {
            $Calculator->calculate();
        });

        /**
         * =============================
         * Check if both of operands are zero
         * =============================
         */
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();

        $Calculator->setOperand1(0)->setOperand2(0)->setOperator('+');

        $this->assertThrowsWithMessage(\Exception::class,'At least two operands are required!', function() use($Calculator) {
            $Calculator->calculate();
        });

        /**
         * =============================
         * Check cos(0)
         * =============================
         */
        $Calculator = CalculatorBuilder::build();
        /** @var IResult $Result */
        $Result = $Calculator->setOperand1(0)->setOperator('cos')->calculate();

        $this->assertEquals(1, $Result->getValue());

        /**
         * =============================
         * Check 12 x 0
         * =============================
         */
        $Calculator = CalculatorBuilder::build();
        /** @var IResult $Result */
        $Result = $Calculator->setOperand1(12)->setOperand2(0)->setOperator('*')->calculate();

        $this->assertEquals(0, $Result->getValue());

        /**
         * =============================
         * Check 23.5 + 12
         * =============================
         */
        $Calculator = CalculatorBuilder::build();
        /** @var IResult $Result */
        $Result = $Calculator->setOperand1(23.5)->setOperand2(12)->setOperator('+')->calculate();

        $this->assertEquals(35.5, $Result->getValue());

        /**
         * =============================
         * Check 48 / 2
         * =============================
         */
        $Calculator = CalculatorBuilder::build();
        /** @var IResult $Result */
        $Result = $Calculator->setOperand1(48)->setOperand2(2)->setOperator('/')->calculate();

        $this->assertEquals(24, $Result->getValue());

        /**
         * =============================
         * Check 2 - 100.23
         * =============================
         */
        $Calculator = CalculatorBuilder::build();
        /** @var IResult $Result */
        $Result = $Calculator->setOperand1(2)->setOperand2(100.23)->setOperator('-')->calculate();

        $this->assertEquals(-98.23, $Result->getValue());
    }



}