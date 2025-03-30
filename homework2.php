<?php

// объявление констант и переменных
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_PRINT = 2;
const OPERATION_DELETE = 3;

$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
];

// объявление созданных функций 

function addItem(array &$items) {
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
}

function deleteItem(array &$items) {
    echo 'Текущий список покупок:' . PHP_EOL;
    echo 'Список покупок: ' . PHP_EOL;
    echo implode("\n", $items) . "\n";

    echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
    $itemName = trim(fgets(STDIN));

    if (in_array($itemName, $items, true) !== false) {
        while (($key = array_search($itemName, $items, true)) !== false) {
            unset($items[$key]);
        }
    }
}

function printItems(array &$items) {
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode(PHP_EOL, $items) . PHP_EOL;
    echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}

function getOperationFromConsole(array $items, array $list) {
    do {
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        if (count($items)) {
            echo 'Ваш список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";
            $operations = $list;
        } else {
            echo 'Ваш список покупок пуст.' . PHP_EOL;
            $operations = array_slice($list, 0, -1);
        }

        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            // проверяем операционную систему
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                system('cls');
            } else {
                system('clear');
            }
            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
            continue; // продолжаем цикл
        }
        
        echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;
        return $operationNumber;

    } while (true); // цикл будет продолжаться, пока не будет return
}

$items = [];

do {

    $operationNumber = getOperationFromConsole($items, $operations);


    switch ($operationNumber) {
        case OPERATION_ADD: 
            addItem($items);
            break;

        case OPERATION_DELETE:
            deleteItem($items);
            break;

        case OPERATION_PRINT:
            printItems($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;
