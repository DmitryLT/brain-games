<?php

namespace BrainGames\Games\Progression;
use function BrainGames\Run\init;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_OF_PROGRESSION = 10;

function logicProgression()
{
    $generateData = function () {
        $step = rand(1, 5);
        $start = rand(1, 10);
        $progression = getRandomProgression($start, $step, LENGTH_OF_PROGRESSION);
        $IndexWithoutNumber = rand(0, LENGTH_OF_PROGRESSION - 1);
        $correctAnswer = $progression[$IndexWithoutNumber];
        $progression[$IndexWithoutNumber] = '..';
        $question = implode(' ', $progression);
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function getRandomProgression($start, $step, $length)
{
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}
