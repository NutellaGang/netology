<?php


$name1 = trim(fgets(STDIN));
$name2 =  trim(fgets(STDIN));
$name3 =  trim(fgets(STDIN));

echo $name1;
echo $name2;
echo $name3;



// fwrite(STDOUT, "Введите первое число: ");
// $num1 = trim(fgets(STDIN));
// fwrite(STDOUT, "Введите второе число: ");
// $num2 = trim(fgets(STDIN));
// echo $num1 . PHP_EOL;
// echo $num2 . PHP_EOL;
// // echo (int)"0" . PHP_EOL;

// if (is_numeric($num1) && is_numeric($num2)) {
//     $num1 = (int)$num1;
//     $num2 = (int)$num2;
//     if ($num2 != 0) {
//         $result = $num1 / $num2;
//         fwrite(STDOUT, "Результат: " . $result . PHP_EOL);
//     } else {
//         fwrite(STDERR, "Делить на 0 нельзя");
//     }
// } else {
//     fwrite(STDERR, "Введите, пожалуйста, число");
// }
