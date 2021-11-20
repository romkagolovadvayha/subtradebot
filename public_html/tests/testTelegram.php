<?php

require_once(__DIR__ . '/../../vendor/autoload.php');

try {
    \TRADEBOT\Telegram::send('test test 2');
} catch (\Exception $e) {
    throw new \Exception($e->getMessage(), $e->getCode(), $e);
}
echo 'ok';