<?php

namespace BrainGames\Games\Prime;
use function BrainGames\Run\init;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function logicPrime()
{
    $generateData = function () {
        $question = rand(0, 10);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$correctAnswer, $question];
    };
    init(DESCRIPTION, $generateData);
}

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }
    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        };
    }
    return true;
}
