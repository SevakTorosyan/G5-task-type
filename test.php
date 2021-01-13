<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/script.php';

const RESULT = 100;

$_GET['first'] = 900000;
$_GET['end'] = 900900;

if (findLuckyNumbers() === RESULT) {
    echo 'Тест успешно пройден';
} else {
    echo 'Тест провален';
}

echo "\n";
