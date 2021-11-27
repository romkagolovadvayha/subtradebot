<?php

require_once(__DIR__ . '/../vendor/autoload.php');

$logger        = new TRADEBOT\Logger(__DIR__ . "/logs/buy.txt");
$config        = \TRADEBOT\Config::getInstance();
$bot = \TRADEBOT\GlobalBot::getBotSettings();
$gateApiConfig = \GateApi\Configuration::getDefaultConfiguration()
    ->setSecret($bot['apiSecretKey'])
    ->setKey($bot['apiKey']);

$apiInstance = new GateApi\Api\SpotApi(new GuzzleHttp\Client(), $gateApiConfig);
$inCurrency  = $_REQUEST['in'];
$toCurrency  = $_REQUEST['to'];
$procMax     = 30; // buy_check_proc_max
$procMin     = -10; // buy_check_proc_min

$pair        = $toCurrency . '_' . $inCurrency;

$associate_array['currency_pair'] = $pair; // string | Currency pair
$associate_array['limit'] = 2; // int | Maximum recent data points returned. `limit` is conflicted with `from` and `to`. If either `from` or `to` is specified, request will be rejected.
$associate_array['interval']      = '5m'; // string | Interval time between data points

$logger->execute("Проверка на наличие пары в gate.io...");
$logger->execute("Пара $pair существует");

// считаем нужно ли купить
$listCandlesticks = $apiInstance->listCandlesticks($associate_array);
$sumBefore        = $listCandlesticks[0][2];
$sumNow           = $listCandlesticks[count($listCandlesticks) - 1][2];
$diffSum          = $sumNow - $sumBefore;
$diffSumProc      = 100 - (($sumBefore * 100) / $sumNow);

$logger->execute("Считаем процент разницу процентов за последние 5 минут");
$logger->execute("Разница в процентах за последние 5 минут: {$diffSumProc}%");
$logger->execute("Текущая стоимость {$toCurrency}: {$sumNow}$");
$logger->execute("5 минут назад стоимость {$toCurrency}: {$sumBefore}$");

if ($diffSumProc > $procMax || $diffSumProc < $procMin) {
    $logger->execute("{$diffSumProc}% > {$procMax}% или {$diffSumProc}% < {$procMin}%");
    $logger->execute("Условие не удовлетворяет: бот завершает работу!");
    exit;
} else {
    $logger->execute("{$diffSumProc}% > {$procMax}% или {$diffSumProc}% < {$procMin}%");
    $logger->execute("Разница в процентах нас удовлетворяет идем дальше...");
}

$balance = $bot['balance'];
$logger->execute("Проверка баланса на USDT счете...");
$logger->execute("Баланс на USDT счете: {$balance}$");

$sumBuy   = $sumNow * 1.007; // buy_proc_price
$countBuy = round((($balance * 0.98) / $sumBuy), 2);
\TRADEBOT\SumMax::set($sumBuy);

$logger->execute("Будем покупать {$toCurrency} на 0.7% дороже: {$sumBuy}$");
$logger->execute("Количество покупаемой манеты: {$countBuy}");
$logger->execute("Создаем ордер на покупку...");

$order    = (new \GateApi\Model\Order())
    ->setAmount($countBuy)
    ->setCurrencyPair($pair)
    ->setPrice($sumBuy)
    ->setSide('buy');

try {
    $createOrder = $apiInstance->createOrder($order);
    $logger->execute("Ордер на покупку успешно создан!");
} catch (\Exception $e) {
    $logger->execute($e->getCode() . ": " . $e->getMessage());
}
for ($i = 0; $i < 4; $i++) {
    sleep(1);
    try {
        $associate_array = [];
        $associate_array['status'] = 'open';
        $listAllOpenOrders = $apiInstance->listAllOpenOrders($associate_array);
        if (empty($listAllOpenOrders)) {
            $logger->execute("Мы успешно купили валюту, ордер на покупку закрыт!");
            break;
        }
        foreach ($listAllOpenOrders as $openOrders) {
            foreach ($openOrders->getOrders() as $order) {
                if ($order->getSide() === 'buy') {
                    if ($i >= 3) {
                        $apiInstance->cancelOrder($order->getId(), $order->getCurrencyPair());
                        $logger->execute("Отменяем ордер на продажу, так как продается более 3 секунд! (Эксперемент)");
                    }
                }
            }
        }
    } catch (\Exception $ex) {
        $logger->execute($ex->getCode() . ": " . $ex->getMessage());
    }
}
for ($i = 0; $i < 3; $i++) {
    $spotAccount = $apiInstance->listSpotAccounts(['currency' => $toCurrency]);
    $balanceTo   = $spotAccount[0]->getAvailable();
  	if ($balanceTo > 0) {
      $logger->execute("Проверка баланса валюты $toCurrency = $balanceTo!");
      $logger->execute("Создаем ордер на продажу...");
      $sumSell = $sumBuy * 1.75;
      $logger->execute("Стоимость манеты, за которую мы хотим продать: {$sumSell}$ (x1.75)");
      $order   = (new \GateApi\Model\Order())
          ->setAmount($balanceTo)
          ->setCurrencyPair($pair)
          ->setPrice($sumSell)
          ->setSide('sell');
      try {
          $createOrder = $apiInstance->createOrder($order);
          $lg = "Ордер на продажу $toCurrency успешно создан!";
          $logger->execute($lg);
          break;
      } catch (\Exception $e) {
          $logger->execute($e->getCode() . ": " . $e->getMessage());
      }
    }
    sleep(1);
}
\TRADEBOT\Telegram::send($logger->getTotalLogs());