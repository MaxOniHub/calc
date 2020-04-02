<?php

namespace app\src;

use app\abstractions\AbstractBaseCalculator;
use app\abstractions\AbstractEngineeringCalculator;
use app\abstractions\AbstractSimpleCalculator;
use app\exceptions\WrongOperatorException;

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
        $this->EngineeringCalculator = new EngineeringCalculator(new Result());
    }

    /**
     * @param $operator
     * @return AbstractBaseCalculator
     * @throws WrongOperatorException
     */
    public function getCalculator($operator)
    {
        if (in_array($operator, $this->BaseCalculator->getAllowedOperations())) {
            return $this->BaseCalculator;
        }

        if (in_array($operator, $this->EngineeringCalculator->getAllowedOperations())) {
            return $this->EngineeringCalculator;
        }
        throw new WrongOperatorException("Wrong operator: ".$operator);
    }

    /**
     * @param AbstractBaseCalculator $Calculator
     * @return bool
     */
    public function isSimpleCalculator(AbstractBaseCalculator $Calculator)
    {
        return is_a($Calculator, AbstractSimpleCalculator::class);
    }

    /**
     * @param AbstractBaseCalculator $Calculator
     * @return bool
     */
    public function isEngineeringCalculator(AbstractBaseCalculator $Calculator)
    {
        return is_a($Calculator, AbstractEngineeringCalculator::class);
    }


}