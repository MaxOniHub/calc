<?php

namespace app\src;

use app\abstractions\AbstractBaseCalculator;
use app\abstractions\AbstractEngineeringCalculator;

/**
 * Class CalculatorManager
 * @package src
 */
class CalculatorManager
{
    /**
     * @var AbstractBaseCalculator
     */
    private $BaseCalculator;

    /**
     * @var AbstractEngineeringCalculator
     */
    private $EngineeringCalculator;

    /**
     * CalculatorManager constructor.
     */
    public function __construct()
    {
        $this->BaseCalculator = new SimpleCalculator(new Result());
        $this->EngineeringCalculator = $engineeringCalculator;

    }

    /**
     * @param $operator
     * @return AbstractBaseCalculator
     */
    public function getCalculator($operator)
    {
        if (in_array($operator, $this->BaseCalculator->getAllowedOperations())) {
            return $this->BaseCalculator;
        }

        if (in_array($operator, $this->EngineeringCalculator->getAllowedOperations())) {
            return $this->EngineeringCalculator;
        }

    }

}