<?php

namespace BrainGames\Games\GameCalc;
use function BrainGames\Run\init;

const RULES = 'What is the result of the expression?';
const OPERANDS = ['+', '-', '*'];

function logicCalc()
{
    $operand = getRandomOperand(OPERANDS);
    $isCorectCalc = function () use ($operand) {
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
    init(RULES, $isCorectCalc);
}

/** Функция генерирует случайный операнд
 * @return string
 */
function getRandomOperand($operands)
{
    $numberOfOperand = rand(0, 2);
    return $operands[$numberOfOperand];
}
