<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$config     = \TRADEBOT\Config::getInstance();
$second = 58;
$sleep = 1;
for ($i = 0; $i < $second; $i++) {
  	$url = $config->settingApp->site . '/sell.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 100);
    curl_exec($ch);
    curl_close ($ch);
    sleep($sleep);
}