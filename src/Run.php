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

/**
 * Функция инициализации
 * @return null
 */

function init($rules, $dataFromGame)
{
    welcome($rules);
    $name = getName();
    $rounds = 3;
    for ($i = 1; $i <= $rounds; $i++) {
        $dataObj = $dataFromGame();
        $question = $dataObj[1];
        $correctAnswer = $dataObj[0];
        $answer = getAnswer($question);

        if ($answer == $correctAnswer) {
            line('Correct!');
            $result = [$answer, $correctAnswer];
        } else {
            $result = [$answer, $correctAnswer];
            break;
        }
    }

    gameOver($result, $name);
}
/**
 * Функция получения ответа от игрока
 * @return string
 */
function getAnswer($question)
{
    line('Question: %s', $question);
    return prompt('Your answer');
}
/**
 * Функция выводит приветствие и правила игры
 * @return null
 */
function welcome($rules)
{
    line('Welcome to the Brain Game!');
    line($rules);
    line('');
}
/**
 * Функция выводит сообщение об окончании игры
 * @return null
 */
function gameOver($result, $name)
{
    $answerAndCorrectAnswer = 2;
        $answer = $result[0];
        $correctAnswer = $result[1];
    if ($answer == $correctAnswer) {
        line('Congratulations, %s.', $name);
        return;
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Let's try again, %s.", $name);
        return;
    }
}
/**
 * Функция выводит имя и присваивает его в переменную
 * @return $name
 */
function getName()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');
    return $name;
}
