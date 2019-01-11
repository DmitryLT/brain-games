<?php
/**
 * Файл для описания функций
 * PHP version 7.2.0
 * @category Executable_File
 * @package  TaggartBrain-games
 * @author  DmitryLT <dim.sha@yandex.ru>
 * @license  no license
 * @link  https://packagist.org/packages/taggart/brain-games
 * */
namespace BrainGames\Run;
use function \cli\line;
use function \cli\prompt;
use BrainGames\Games\GameCalc;
use BrainGames\Games\GameEven;

const ROUNDS = 3;

function init($description, $dataFromGame)
{
    welcome($description);
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    for ($i = 1; $i <= ROUNDS; $i++) {
        [$correctAnswer, $question] = $dataFromGame();
        line('Question: %s', $question);
        $answer = prompt('Your answer');

        if ($answer == $correctAnswer) {
            line('Correct!');
            $result = ['answer' => $answer, 'correctAnswer' => $correctAnswer];
        } else {
            $result = ['answer' => $answer, 'correctAnswer' => $correctAnswer];
            break;
        }
    }

    if ($result['answer'] == $result['correctAnswer']) {
        line('Congratulations, %s.', $name);
        return;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $result['answer'], $result['correctAnswer']);
        line("Let's try again, %s.", $name);
        return;
    }
}

function welcome($description)
{
    line('Welcome to the Brain Game!');
    line($description);
    line('');
}
