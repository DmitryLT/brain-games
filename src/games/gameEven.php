<?php

namespace BrainGames\Games\GameEven;
use function BrainGames\Run\init;

const DESCRIPTION = 'Answer "yes" if number even otherwise answer "no".';

function logicEven()
{
    $generateData = function () {
        $question = rand();
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function isEven(int $number)
{
    return $number % 2 === 0;
}
