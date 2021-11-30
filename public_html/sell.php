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
    $rates = \TRADEBOT\GlobalBot::getRate($pairTo);
    if (empty($rates['buy'])) {
        $logger->execute("Ошибка при получении ставок по паре $pair");
        exit;
    }
    try {
        $sumNow = $rates['rate']['rate'];
    } catch (\Exception $e) {
        $logger->execute("Ошибка при получении курса $pair");
        $logger->execute($e->getCode() . ": " . $e->getMessage());
        exit;
    }
    $oldSum = $rates['buy']['price'];
    foreach ($openOrders->getOrders() as $order) {
        $maxPrice = \TRADEBOT\SumMax::get();
        if ($maxPrice < $sumNow) {
            \TRADEBOT\SumMax::set($sumNow);
        }
        $diffMaxSumProc = 100 - (($maxPrice * 100) / $sumNow);
        $diffSumProc = 100 - (($oldSum * 100) / $sumNow);
        $logger->execute("Условие от цены покупки {$diffSumProc}% < -5%");
        $logger->execute("Условие максимума ({$diffMaxSumProc}% < -5%)");
      	// sell_proc_max * (-1) (положительное число)
        if ($diffSumProc < -5 || $diffMaxSumProc < -5) {
            $newSum = $sumNow * 0.993; // sell_proc_price
            $logger->execute("Создаем ордер на продажу {$pair}...");
            $logger->execute("Купили за {$oldSum}$, текущая за {$sumNow}$, продаем за {$newSum}$");
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
                $logger->execute($e->getCode() . ": " . $e->getMessage());
                $apiInstance->createOrder($order);
            }
        }
        \TRADEBOT\Telegram::send($logger->getTotalLogs());
    }
}
echo 'ok';