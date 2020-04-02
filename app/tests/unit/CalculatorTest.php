<?php

namespace app\tests\unit;

use app\abstractions\AbstractEngineeringCalculator;
use app\abstractions\AbstractSimpleCalculator;
use app\builders\CalculatorBuilder;
use app\src\Calculator;

class CalculatorTest extends \Codeception\Test\Unit
{
    /**
     * @var \ExampleTest
     */
    protected $tester;

    // tests
    public function testIfProperCalculatorWasChosenByOperator()
    {
        /** @var Calculator $Calculator */
        $Calculator = CalculatorBuilder::build();

        $Calculator
            ->setOperand1(1)
            ->setOperand2(2)
            ->setOperator('+')
            ->calculate();

        /** Check simple calculator */
        $this->assertEquals(AbstractSimpleCalculator::class, get_parent_class($Calculator->getCalculator()));

        $Calculator
            ->setOperator('exp')
            ->calculate();

        /** Check Engineering calculator */
        $this->assertEquals(AbstractEngineeringCalculator::class, get_parent_class($Calculator->getCalculator()));
    }
}