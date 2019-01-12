<?php

namespace BrainGames\Games\Progression;
use function BrainGames\Run\init;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH_OF_PROGRESSION = 10;

function logicProgression()
{
    $generateData = function () {
        $progression = getRandomProgression();
        $IndexWithoutNumber = rand(0, LENGTH_OF_PROGRESSION - 1);
        $correctAnswer = $progression[$IndexWithoutNumber];
        $progression[$IndexWithoutNumber] = '..';
        $question = implode(' ', $progression);
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function getRandomProgression()
{
    $step = rand(1, 5);
    $start = rand(1, 10);
    for ($i = 0; $i < LENGTH_OF_PROGRESSION; $i++) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}
