<?php

namespace BrainGames\Games\Progression;
use function BrainGames\Run\init;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_OF_PROGRESSION = 10;

function logicProgression()
{
    $generateData = function () {
        [$question, $step, $IndexWithoutNumber] = getRandomProgression(LENGTH_OF_PROGRESSION);
        $questionArray = explode(' ', $question);
        if ($IndexWithoutNumber != 0) {
            $correctAnswer = $questionArray[$IndexWithoutNumber - 1] + $step;
        } else {
            $correctAnswer = $questionArray[$IndexWithoutNumber + 1] - $step;
        }
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function getRandomProgression($length)
{
    $progression = [];
    $IndexWithoutNumber = rand(0, $length - 1);
    $step = rand(1, 5);
    $currentValue = rand(0, 10);
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $currentValue;
        if ($i == $IndexWithoutNumber) {
            $progression[$i] = '..';
            $currentValue += $step;
            continue;
        }
        $currentValue += $step;
    }
    $strProgression = implode(' ', $progression);
    return [$strProgression, $step, $IndexWithoutNumber];
}
