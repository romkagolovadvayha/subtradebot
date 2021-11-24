<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$logger = new TRADEBOT\Logger(__DIR__ . "/logs/sell.txt");
$config        = \TRADEBOT\Config::getInstance();
$bot = \TRADEBOT\GlobalBot::getBotSettings();

$gateApiConfig = \GateApi\Configuration::getDefaultConfiguration()
        ->setSecret($bot['apiSecretKey'])
        ->setKey($bot['apiKey']);

$apiInstance = new GateApi\Api\SpotApi(new GuzzleHttp\Client(), $gateApiConfig);

$associate_array = [];
$associate_array['status'] = 'open';
try {
    $listAllOpenOrders = $apiInstance->listAllOpenOrders($associate_array);
} catch (\Exception $ex) {
    print_r($ex->getMessage());
    exit;
}

foreach ($listAllOpenOrders as $openOrders) {
    $pair = $openOrders->getCurrencyPair();
    $pairTo = explode('_', $pair)[0];
    $associate_array['currency_pair'] = $pair; // string | Currency pair
    $associate_array['limit'] = 5; // int | Maximum recent data points returned. `limit` is conflicted with `from` and `to`. If either `from` or `to` is specified, request will be rejected.
    $associate_array['interval'] = '1m'; // string | Interval time between data points
    $history = $apiInstance->listMyTrades($associate_array);
    $oldSum = $history[0]->getPrice();
    $listCandlesticks = $apiInstance->listCandlesticks($associate_array);
    $sumNow = $listCandlesticks[count($listCandlesticks) - 1][2];
    foreach ($openOrders->getOrders() as $order) {
        $maxPrice = \TRADEBOT\SumMax::get();
        if ($maxPrice < $sumNow) {
            \TRADEBOT\SumMax::set($sumNow);
        }
        $diffMaxSumProc = 100 - (($maxPrice * 100) / $sumNow);
        $diffSumProc = 100 - (($oldSum * 100) / $sumNow);
        $logger->execute("Условие $diffSumProc < -5");
        $logger->execute("Условие MAX $diffMaxSumProc < -5");
      	// sell_proc_max * (-1) (положительное число)
        if ($diffSumProc < -5 || $diffMaxSumProc < -5) {
            $newSum = $sumNow * 0.995; // sell_proc_price
            $logger->execute("Продаем пару $pair");
            $logger->execute("Купили за $oldSum, текущая за $sumNow, продаем за $newSum");
            $apiInstance->cancelOrder($order->getId(), $pair);
            $order = (new \GateApi\Model\Order())
                    ->setAmount($order->getAmount())
                    ->setCurrencyPair($pair)
                    ->setPrice($newSum)
                    ->setSide('sell');
            try {
                $apiInstance->createOrder($order);
                $logger->execute("Стоп торги по паре $pair, выставляем ордер на продажу!");
            } catch (\Exception $e) {
                $logger->execute("Ошибка при создании ордера на продажу!");
                $apiInstance->createOrder($order);
                $logger->execute($e->getCode() . ": " . $e->getMessage());
            }
        }
        \TRADEBOT\Telegram::send($logger->getTotalLogs());
    }
}
echo 'ok';