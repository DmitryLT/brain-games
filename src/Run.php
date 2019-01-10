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

function init($gameName)
{
    if ($gameName == 'even') {
        welcome(GameEven\RULES);
    } elseif ($gameName == 'calc') {
        welcome(GameCalc\RULES);
    }
    $name = getName();
    $rounds = GameCalc\ROUNDS;
    if ($gameName == 'even') {
        $result = logicEven($rounds);
    } elseif ($gameName == 'calc') {
        $result = logicCalc($rounds);
    }
    
    gameOver($result, $name);
}
/**
 * Функция логики игры brain-calc
 * @return array
 */
function logicCalc($rounds)
{
    for ($i = 1; $i <= $rounds; $i++) {
        $operand = getRandomOperand(GameCalc\OPERANDS);
        $firstRand = rand(0, 100);
        $secondRand = rand(0, 100);
        $question = "{$firstRand} {$operand} {$secondRand}";
        $answer = getAnswer($question);
        $correctAnswer = isCorrectCalc($question);
    
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            return $result = [$answer, $correctAnswer];
        }
    }
    return $result = [$answer, $correctAnswer];
}
/**
 * Функция логики игры brain-even
 * @return array
 */
function logicEven($rounds)
{
    for ($i = 1; $i <= $rounds; $i++) {
        $question = rand();
        $answer = getAnswer($question);
        $correctAnswer = isCorrectEven($question);
    
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            return $result = [$answer, $correctAnswer];
        }
    }
    return $result = [$answer, $correctAnswer];
}
/**
 * Функция получения ответа от игрока
 * @return string
 */
function getAnswer($question)
{
    line('Question: %s', $question);
    return $answer = prompt('Your answer');
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
 * Функция для определения правильности ответа brain-calc
 * @return correctAnswer
 */
function isCorrectCalc(string $str)
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
 * Функция для определения правильности ответа brain-even
 * @return correctAnswer
 */
function isCorrectEven(int $number)
{
    return $result = isEven($number) ? 'yes' : 'no';
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
    if (count($result) != 2) {
        return;
    } else {
        $answer = $result[0];
        $correctAnswer = $result[1];
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
function getRandomOperand($operands)
{
    $numberOfOperand = rand(0, 2);
    return $operands[$numberOfOperand];
}
