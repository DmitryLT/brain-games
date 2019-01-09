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

namespace BrainGames\Games\GameCalc;
use function \cli\line;
use function \cli\prompt;
/**
 * Функция инициализации
 * @return null
 */
function init()
{
    welcome();
    $name = getName();
    $rounds = 3;

    for ($i = 1; $i <= $rounds; $i++) {
        $operand = getRandomOperand();
        $firstRand = rand(0, 100); 
        $secondRand = rand(0, 100);

        $question = "{$firstRand} {$operand} {$secondRand}";
        line('Question: %s', $question);

        $answer = prompt('Your answer');
        $correctAnswer = isCorrect($question);
    
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            break;
        }
    }
    
    gameOver($answer, $correctAnswer, $name);
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
function isCorrect(string $str)
{
    $result = 0;
    $operand = '';
    $firstNumber = '';
    $secondNumber = '';

    $array = explode(' ', $str);
    foreach ($array as $value) {
        if ($value == '+' || $value == '-' || $value == '*') {
            $operand = $value;
        } elseif ($firstNumber == '') {
            $firstNumber = $value;
        } else {
            $secondNumber = $value;
        }
    }
    switch ($operand) {
    case '+':
        return $result = $firstNumber + $secondNumber;
        break;
    case '-':
        return $result = $firstNumber - $secondNumber;
        break;
    case '*':
        return $result = $firstNumber * $secondNumber;
        break;
    }
}
/**
 * Функция выводит приветствие
 * @return null
 */
function welcome()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if number even otherwise answer "no".');
    line('');
}
/**
 * Функция выводит сообщение об окончании игры
 * @return null
 */
function gameOver($answer, $correctAnswer, $name)
{
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
/**
 * Функция генерирует случайный операнд
 * @return string
 */
function getRandomOperand()
{
    $operands = ['+', '-', '*'];
    $numberOfOperand = rand(0, 2);

    return $operands[$numberOfOperand];
}
