<?php

namespace BrainGames\Games\GameEven;
use function BrainGames\Run\init;

const RULES = 'Answer "yes" if number even otherwise answer "no".';

function logicEven()
{
    $isEven = function (int $number) {
        return $number % 2 === 0;
    };
    $isCorectEven = function () use ($isEven) {
        $question = rand();
        $correctAnswer = $isEven($question) ? 'yes' : 'no';

        return [$correctAnswer, $question];
    };
    init(RULES, $isCorectEven);
}
