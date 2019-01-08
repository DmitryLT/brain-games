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

namespace BrainGames\GameEven;
use function \cli\line;
use function \cli\prompt;
/**
 * Функция инициализации
 * @return null
 */
function init()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    line('');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('');

    for ($i = 0; $i <= 2; $i++) {
        $randomInt = rand();
        line('Question: %s', $randomInt);
        $answer = prompt('Your answer');
        $correctAnswer = isCorrect($randomInt);
    
        if ($answer == $correctAnswer) {
            line('Correct!');
            if ($i == 2) {
                line('Congratulations, %s', $name);
                return;
            }
        } else {
            line('%s is wrong answer ;(. Correct answer was %s.', $answer, $correctAnswer);
            line("Let's try again, %s.", $name);
            break;
        }
    }
    return;
}
/**
 * Функция определения четности числа
 * @return bool
 */
function isEven(int $number)
{
    if ($number % 2 === 0) {
        return true;
    } else {
        return false;
    }
}
/**
 * Функция для определения правильности ответа
 * @return correctAnswer
 */
function isCorrect(int $number)
{
    if (isEven($number)) {
        $result = "yes";
    } else {
        $result = "no";
    }

    return $result;
}
