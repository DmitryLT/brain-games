<?php

namespace BrainGames\Games\Calc;
use function BrainGames\Run\init;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function logicCalc()
{
    $generateData = function () {
        $operand = getRandomOperator(OPERATORS);
        $firstRand = rand(0, 100);
        $secondRand = rand(0, 100);
        $question = "{$firstRand} {$operand} {$secondRand}";
        switch ($operand) {
            case '+':
                $correctAnswer = $firstRand + $secondRand;
                break;
            case '-':
                $correctAnswer = $firstRand - $secondRand;
                break;
            case '*':
                $correctAnswer = $firstRand * $secondRand;
                break;
        }

        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function getRandomOperator(array $operators)
{
    $quantityOfOperators = count($operators) - 1;
    $numberOfOperator = rand(0, $quantityOfOperators);
    return $operators[$numberOfOperator];
}
