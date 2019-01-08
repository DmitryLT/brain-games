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

namespace BrainGames\Cli;
use function \cli\line;
use function \cli\prompt;
/**
 * Функция инициализации
 * @return null
 */
function run()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
