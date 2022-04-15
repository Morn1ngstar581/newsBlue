<?php
function appenText($number, $type) {
    // массив слов
    $textArr = array(
        'h' => array('час', 'часа', 'часов'),

    );
    $number = (int) $number; // приводим к числу
    $result = $number . ' '; // формируем начало строки
    // проверка на наличие типа в массиве
    if(isset($textArr[$type])) {
        // если число больше 20 то берем остаток от деления на 10
        switch ( ($number >= 20) ? $number % 10 : $number )
        {
            case 1:
                $result .= $textArr[$type][0];
                break;
            case 2:
            case 3:
            case 4:
                $result .= $textArr[$type][1];
                break;
            default:
                $result .= $textArr[$type][2];
        }
    }
    return $result;
}