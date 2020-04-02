<?php

namespace app\builders;

use app\src\Calculator;
use app\src\CalculatorManager;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class CalculatorBuilder
 * @package app\abstractions
 */
class CalculatorBuilder
{
    /**
     * @return object
     * @throws \Exception
     */
    public static function build()
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->register('calculator_manager', CalculatorManager::class);

        $containerBuilder->register('calculator', Calculator::class)
            ->addArgument(new Reference('calculator_manager'));

        return $containerBuilder->get('calculator');
    }

}