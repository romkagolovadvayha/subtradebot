<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

$config      = \TRADEBOT\Config::getInstance();
$botSettings = \TRADEBOT\GlobalBot::getBotSettings();

$text = "Ваши настройки для бота:\n\n";

$text .= "apiKey: " . $botSettings['apiKey'] . "\n";
$text .= "Ваш ключ от биржи gate.io\n\n";

$text .= "apiSecretKey: " . $botSettings['apiSecretKey'] . "\n";
$text .= "Ваш секретный ключ от биржи gate.io\n\n";

$text .= "buy_check_proc_minutes: " . $botSettings['buy_check_proc_minutes'] . " мин.\n";
$text .= "Время которое проверяется валюта перед покупкой\n\n";

$text .= "buy_check_proc_max: " . $botSettings['buy_check_proc_max'] . "%\n";
$text .= "Верхняя граница взлета валюты за {buy_check_proc_minutes} мин.\n\n";

$text .= "buy_check_proc_min: " . $botSettings['buy_check_proc_min'] . "%\n";
$text .= "Нижняя граница падения валалюты за {buy_check_proc_minutes} мин.\n\n";

$text .= "buy_proc_price: " . $botSettings['buy_proc_price'] . "\n";
$text .= "Выставить ордер на покупку чуть-чуть ваше стоимости, чтобы быстрее купить\n\n";

$text .= "sell_proc_price: " . $botSettings['sell_proc_price'] . "\n";
$text .= "Выставить ордер на продажу чуть-чуть ниже стоимости, чтобы быстрее продать\n\n";

$text .= "sell_proc_max: " . $botSettings['sell_proc_max'] . "%\n";
$text .= "Продаем если валюта которую мы купили опустилась на {sell_proc_max}% от максимума, который удалось наблюдать\n\n";

echo $text;