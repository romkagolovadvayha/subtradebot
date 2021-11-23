<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$logger        = new TRADEBOT\Logger(__DIR__ . "/logs/buy.txt");
$config        = \TRADEBOT\Config::getInstance();
$bot = \TRADEBOT\GlobalBot::getBotSettings();
$gateApiConfig = \GateApi\Configuration::getDefaultConfiguration()
    ->setSecret($bot['apiSecretKey'])
    ->setKey($bot['apiKey']);

$apiInstance = new GateApi\Api\SpotApi(new GuzzleHttp\Client(), $gateApiConfig);
$apiWallet   = new GateApi\Api\WalletApi(new GuzzleHttp\Client(), $gateApiConfig);
$limit       = 2; // последние 2 минуты buy_check_proc_minutes
$inCurrency  = $_REQUEST['in'];
$toCurrency  = $_REQUEST['to'];
$procMax     = 30; // buy_check_proc_max
$procMin     = -10; // buy_check_proc_min
$amount      = 10;
$pair        = $toCurrency . '_' . $inCurrency;

$associate_array['currency_pair'] = $pair; // string | Currency pair
$associate_array['limit']
                                  = $limit; // int | Maximum recent data points returned. `limit` is conflicted with `from` and `to`. If either `from` or `to` is specified, request will be rejected.
$associate_array['interval']      = '1m'; // string | Interval time between data points

$logger->execute('Проверка на наличие пары в gate.io');
// проверка на наличие пары в gate.io
try {
    $listCurrencyPairs = $apiInstance->getCurrencyPair($pair);
} catch (\Exception $ex) {
    $lg = "Ошибка: $pair пары нет в gate.io";
    $logger->execute($lg);
    \TRADEBOT\Telegram::send($lg);
    exit;
}
$logger->execute('Пара существует');

// считаем нужно ли купить
$listCandlesticks = $apiInstance->listCandlesticks($associate_array);
$sumBefore        = $listCandlesticks[0][2];
$sumNow           = $listCandlesticks[count($listCandlesticks) - 1][2];
$diffSum          = $sumNow - $sumBefore;
$diffSumProc      = 100 - (($sumBefore * 100) / $sumNow);
$logger->execute('Считаем процент...');

$result = [
    'buy'      => $toCurrency,
    'sell' => $inCurrency,
    'sum ' . $limit . ' minute back' => $sumBefore,
    'sum now'  => $sumNow,
    'diff sum' => $diffSum,
    'diff proc' => $diffSumProc . '%',
];

$logger->execute(json_encode($result));

$logger->execute("Разница в $diffSumProc%");

if ($diffSumProc > $procMax || $diffSumProc < $procMin) {
    $lg = "Стоп: процент ($diffSumProc% > $procMax% или $diffSumProc% < $procMin%) не удовлетворяет!";
    $logger->execute($lg);
    \TRADEBOT\Telegram::send($lg);
    exit;
}

$spotAccount = $apiInstance->listSpotAccounts(['currency' => $toCurrency]);
$balanceTo   = $spotAccount[0]->getAvailable();
$logger->execute("Баланс на $toCurrency счете: $balanceTo!");

$spotAccount = $apiInstance->listSpotAccounts(['currency' => 'USDT']);
$balance     = $spotAccount[0]->getAvailable();
$logger->execute("Баланс на USDT счете: $balance");
$logger->execute("Создаем ордер на покупку...");

$sumBuy   = $sumNow * 1.005; // buy_proc_price
$countBuy = round(($balance / $sumBuy) * 0.98, 2);
\TRADEBOT\SumMax::set($sumBuy);

$result = [
    'sumBuy' => $sumBuy,
    'countBuy' => $countBuy,
];

$logger->execute(json_encode($result));

$order    = (new \GateApi\Model\Order())
    ->setAmount($countBuy)
    ->setCurrencyPair($pair)
    ->setPrice($sumBuy)
    ->setSide('buy');
$logger->execute(json_encode($order));
try {
    $apiInstance->createOrder($order);
    $lg = "Купили $toCurrency за $sumBuy";
    $logger->execute($lg);
    \TRADEBOT\Telegram::send($lg);
} catch (\Exception $e) {
    $logger->execute($e->getCode() . ": " . $e->getMessage());
    \TRADEBOT\Telegram::send($e->getCode() . ": " . $e->getMessage());
    exit;
}

for ($i = 0; $i < 3; $i++) {
    $spotAccount = $apiInstance->listSpotAccounts(['currency' => $toCurrency]);
    $balanceTo   = $spotAccount[0]->getAvailable();
	$logger->execute("Проверка баланса валюты $toCurrency = $balanceTo!");
  	if ($balanceTo > 0) {
      $logger->execute("Создаем ордер на продажу...");
      $sumSell = $sumBuy * 1.75;
      $order   = (new \GateApi\Model\Order())
          ->setAmount($balanceTo)
          ->setCurrencyPair($pair)
          ->setPrice($sumSell)
          ->setSide('sell');
      try {
          $apiInstance->createOrder($order);
          $lg = "Выставили на продажу $toCurrency за $sumSell";
          $logger->execute($lg);
      } catch (\Exception $e) {
          $logger->execute($e->getCode() . ": " . $e->getMessage());
      }
    } else {
      break; 
    }
    sleep(1);
}
\TRADEBOT\Telegram::send($logger->getTotalLogs());
$logger->execute("Ордер $pair открыт!");