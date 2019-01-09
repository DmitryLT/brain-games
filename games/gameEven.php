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

namespace BrainGames\Games\GameEven;
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
    $rounds = 3;

    for ($i = 1; $i <= $rounds; $i++) {
        $question = rand();
        line('Question: %s', $question);
        $answer = prompt('Your answer');
        $correctAnswer = isCorrect($question);
    
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            break;
        }
    }
    
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
 * Функция определения четности числа
 * @return bool
 */
function isEven(int $number)
{
    return $number % 2 === 0;
}
/**
 * Функция для определения правильности ответа
 * @return correctAnswer
 */
function isCorrect(int $number)
{
    return $result = isEven($number) ? 'yes' : 'no';
}
