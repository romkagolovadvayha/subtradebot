<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$logger        = new TRADEBOT\Logger(__DIR__ . "/logs/buy.txt");
$config        = \TRADEBOT\Config::getInstance();
$bot = \TRADEBOT\GlobalBot::getBotSettings();
$gateApiConfig = \GateApi\Configuration::getDefaultConfiguration()
                                       ->setSecret($bot['apiSecretKey'])
                                       ->setKey($bot['apiKey']);

$apiInstance = new GateApi\Api\SpotApi(new GuzzleHttp\Client(), $gateApiConfig);


$associate_array           = [];
$associate_array['status'] = 'open';
$listAllOpenOrders         = $apiInstance->listAllOpenOrders($associate_array);
foreach ($listAllOpenOrders as $openOrders) {
    foreach ($openOrders->getOrders() as $order) {
        $apiInstance->cancelOrder($order->getId(), $order->getCurrencyPair());
        $logger->execute("Отменяем ордер на продажу, так как продается более 3 секунд! (Эксперемент)");
    }
}