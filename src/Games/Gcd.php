<?php

namespace BrainGames\Games\Gcd;
use function BrainGames\Run\init;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function logicGcd()
{
    $generateData = function () {
        $firstNumber = rand(1, 10);
        $secondNumber = rand(1, 10);
        $question = "{$firstNumber} {$secondNumber}";
        $correctAnswer = getGreatestCommonDivisor($firstNumber, $secondNumber);
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function getGreatestCommonDivisor($a, $b)
{
    $minNumber = min($a, $b);
    $maxNumber = max($a, $b);
    for ($i = $minNumber; $i >= 1; $i--) {
        if ($minNumber % $i == 0) {
            if ($maxNumber % $i == 0) {
                return $i;
            }
        }
    }
}
