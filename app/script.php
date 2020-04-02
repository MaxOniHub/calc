<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;


require_once 'vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->register('calculator_manager', \app\src\CalculatorManager::class);

$containerBuilder->register('calculator', \app\src\Calculator::class)
    ->addArgument(new Reference('calculator_manager'));


/** @var \app\src\Calculator $Calculator */
$Calculator = $containerBuilder->get('calculator');

$result = $Calculator
    ->setOperand1(1)
    ->setOperand2(2)
    ->setOperator('+');

