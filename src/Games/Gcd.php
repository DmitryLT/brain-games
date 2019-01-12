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
        $minNumber = min($firstNumber, $secondNumber);
        $maxNumber = max($firstNumber, $secondNumber);
        for ($i = $minNumber; $i >= 1; $i--) {
            if ($minNumber % $i == 0) {
                if ($maxNumber % $i == 0) {
                    $correctAnswer = $i;
                    break;
                }
            }
        }
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}
