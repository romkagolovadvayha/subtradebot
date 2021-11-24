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
$result = "Открытых ордеров: " . count($listAllOpenOrders) ;

$total = 0;
$coursRub = 72;
$spotAccounts = $apiInstance->listSpotAccounts([]);
foreach ($spotAccounts as $account) {
    if ($account->getAvailable() > 0) {
        $cours = 1;
        if ($account->getCurrency() !== 'USDT' && $account->getCurrency() !== 'USD') {
            $associate_array = [];
            $associate_array['status'] = 'open';
            $associate_array['currency_pair'] = $account->getCurrency() . '_USDT';
            $associate_array['limit'] = 5;
            $associate_array['interval'] = '10s';
            $listCandlesticks = $apiInstance->listCandlesticks($associate_array);
            $cours = $listCandlesticks[count($listCandlesticks) - 1][2];
        }
        $balance = $account->getAvailable()*$cours;
        $result .= "\nБаланс на ".$account->getCurrency()." счете: " . $balance . "$";
        $total += $balance;
    }
}
$result .= "\nОбщий баланс на счете: " . $total . "$";
$result .= "\nОбщий баланс в рублях (примерно) на счете: " . $total * $coursRub . " руб";
echo str_replace("\n", "<br/>", $result);