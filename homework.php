<?php

echo "Введите имя: ";
$name1 = trim(fgets(STDIN));

echo "Введите фамилию: ";
$name2 = trim(fgets(STDIN));

echo "Введите отчество: ";
$name3 = trim(fgets(STDIN));

$name1 = mb_convert_case($name1, MB_CASE_TITLE, "UTF-8");
$name2 = mb_convert_case($name2, MB_CASE_TITLE, "UTF-8");
$name3 = mb_convert_case($name3, MB_CASE_TITLE, "UTF-8");

$fullname = $name2 . " " . $name1 . " " . $name3;

$initial1 = mb_substr($name1, 0, 1);
$initial2 = mb_substr($name2, 0, 1);
$initial3 = mb_substr($name3, 0, 1);

$surnameAndInitials = $name2 . " " . $initial1 . "." . $initial3 . ".";

$fio = $initial2 . $initial1 . $initial3;

echo "Полное имя: '$fullname'". PHP_EOL;
echo "Фамилия и инициалы: '$surnameAndInitials'" . PHP_EOL;
echo "Аббревиатура: '$fio'" . PHP_EOL;
