# GateApi\WalletApi

All URIs are relative to *https://api.gateio.ws/api/v4*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getDepositAddress**](WalletApi.md#getDepositAddress) | **GET** /wallet/deposit_address | Generate currency deposit address
[**listWithdrawals**](WalletApi.md#listWithdrawals) | **GET** /wallet/withdrawals | Retrieve withdrawal records
[**listDeposits**](WalletApi.md#listDeposits) | **GET** /wallet/deposits | Retrieve deposit records
[**transfer**](WalletApi.md#transfer) | **POST** /wallet/transfers | Transfer between trading accounts
[**listSubAccountTransfers**](WalletApi.md#listSubAccountTransfers) | **GET** /wallet/sub_account_transfers | Transfer records between main and sub accounts
[**transferWithSubAccount**](WalletApi.md#transferWithSubAccount) | **POST** /wallet/sub_account_transfers | Transfer between main and sub accounts
[**listWithdrawStatus**](WalletApi.md#listWithdrawStatus) | **GET** /wallet/withdraw_status | Retrieve withdrawal status
[**listSubAccountBalances**](WalletApi.md#listSubAccountBalances) | **GET** /wallet/sub_account_balances | Retrieve sub account balances
[**getTradeFee**](WalletApi.md#getTradeFee) | **GET** /wallet/fee | Retrieve personal trading fee


## getDepositAddress

> \GateApi\Model\DepositAddress getDepositAddress($currency)

Generate currency deposit address

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$currency = 'USDT'; // string | Currency name

try {
    $result = $apiInstance->getDepositAddress($currency);
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->getDepositAddress: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **currency** | **string**| Currency name |

### Return type

[**\GateApi\Model\DepositAddress**](../Model/DepositAddress.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listWithdrawals

> \GateApi\Model\LedgerRecord[] listWithdrawals($currency, $from, $to, $limit, $offset)

Retrieve withdrawal records

Record time range cannot exceed 30 days

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['currency'] = 'BTC'; // string | Filter by currency. Return all currency records if not specified
$associate_array['from'] = 1602120000; // int | Time range beginning, default to 7 days before current time
$associate_array['to'] = 1602123600; // int | Time range ending, default to current time
$associate_array['limit'] = 100; // int | Maximum number of records returned in one list
$associate_array['offset'] = 0; // int | List offset, starting from 0

try {
    $result = $apiInstance->listWithdrawals($associate_array);
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->listWithdrawals: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **currency** | **string**| Filter by currency. Return all currency records if not specified | [optional]
 **from** | **int**| Time range beginning, default to 7 days before current time | [optional]
 **to** | **int**| Time range ending, default to current time | [optional]
 **limit** | **int**| Maximum number of records returned in one list | [optional] [default to 100]
 **offset** | **int**| List offset, starting from 0 | [optional] [default to 0]

### Return type

[**\GateApi\Model\LedgerRecord[]**](../Model/LedgerRecord.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listDeposits

> \GateApi\Model\LedgerRecord[] listDeposits($currency, $from, $to, $limit, $offset)

Retrieve deposit records

Record time range cannot exceed 30 days

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['currency'] = 'BTC'; // string | Filter by currency. Return all currency records if not specified
$associate_array['from'] = 1602120000; // int | Time range beginning, default to 7 days before current time
$associate_array['to'] = 1602123600; // int | Time range ending, default to current time
$associate_array['limit'] = 100; // int | Maximum number of records returned in one list
$associate_array['offset'] = 0; // int | List offset, starting from 0

try {
    $result = $apiInstance->listDeposits($associate_array);
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->listDeposits: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **currency** | **string**| Filter by currency. Return all currency records if not specified | [optional]
 **from** | **int**| Time range beginning, default to 7 days before current time | [optional]
 **to** | **int**| Time range ending, default to current time | [optional]
 **limit** | **int**| Maximum number of records returned in one list | [optional] [default to 100]
 **offset** | **int**| List offset, starting from 0 | [optional] [default to 0]

### Return type

[**\GateApi\Model\LedgerRecord[]**](../Model/LedgerRecord.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## transfer

> transfer($transfer)

Transfer between trading accounts

Transfer between different accounts. Currently support transfers between the following:  1. spot - margin 2. spot - futures(perpetual) 3. spot - delivery

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$transfer = new \GateApi\Model\Transfer(); // \GateApi\Model\Transfer | 

try {
    $apiInstance->transfer($transfer);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->transfer: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transfer** | [**\GateApi\Model\Transfer**](../Model/Transfer.md)|  |

### Return type

void (empty response body)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listSubAccountTransfers

> \GateApi\Model\SubAccountTransfer[] listSubAccountTransfers($sub_uid, $from, $to, $limit, $offset)

Transfer records between main and sub accounts

Record time range cannot exceed 30 days  > Note: only records after 2020-04-10 can be retrieved

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['sub_uid'] = '10003'; // string | Sub account user ID. Return records related to all sub accounts if not specified
$associate_array['from'] = 1602120000; // int | Time range beginning, default to 7 days before current time
$associate_array['to'] = 1602123600; // int | Time range ending, default to current time
$associate_array['limit'] = 100; // int | Maximum number of records returned in one list
$associate_array['offset'] = 0; // int | List offset, starting from 0

try {
    $result = $apiInstance->listSubAccountTransfers($associate_array);
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->listSubAccountTransfers: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sub_uid** | **string**| Sub account user ID. Return records related to all sub accounts if not specified | [optional]
 **from** | **int**| Time range beginning, default to 7 days before current time | [optional]
 **to** | **int**| Time range ending, default to current time | [optional]
 **limit** | **int**| Maximum number of records returned in one list | [optional] [default to 100]
 **offset** | **int**| List offset, starting from 0 | [optional] [default to 0]

### Return type

[**\GateApi\Model\SubAccountTransfer[]**](../Model/SubAccountTransfer.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## transferWithSubAccount

> transferWithSubAccount($sub_account_transfer)

Transfer between main and sub accounts

Support transferring with sub user's spot or futures account. Note that only main user's spot account is used no matter which sub user's account is operated.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$sub_account_transfer = new \GateApi\Model\SubAccountTransfer(); // \GateApi\Model\SubAccountTransfer | 

try {
    $apiInstance->transferWithSubAccount($sub_account_transfer);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->transferWithSubAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sub_account_transfer** | [**\GateApi\Model\SubAccountTransfer**](../Model/SubAccountTransfer.md)|  |

### Return type

void (empty response body)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listWithdrawStatus

> \GateApi\Model\WithdrawStatus[] listWithdrawStatus($currency)

Retrieve withdrawal status

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['currency'] = 'BTC'; // string | Retrieved specified currency related data

try {
    $result = $apiInstance->listWithdrawStatus($associate_array);
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->listWithdrawStatus: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **currency** | **string**| Retrieved specified currency related data | [optional]

### Return type

[**\GateApi\Model\WithdrawStatus[]**](../Model/WithdrawStatus.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## listSubAccountBalances

> \GateApi\Model\SubAccountBalance[] listSubAccountBalances($sub_uid)

Retrieve sub account balances

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['sub_uid'] = '10003'; // string | Sub account user ID. Return records related to all sub accounts if not specified

try {
    $result = $apiInstance->listSubAccountBalances($associate_array);
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->listSubAccountBalances: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **sub_uid** | **string**| Sub account user ID. Return records related to all sub accounts if not specified | [optional]

### Return type

[**\GateApi\Model\SubAccountBalance[]**](../Model/SubAccountBalance.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)


## getTradeFee

> \GateApi\Model\TradeFee getTradeFee()

Retrieve personal trading fee

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure Gate APIv4 authorization: apiv4
$config = GateApi\Configuration::getDefaultConfiguration()->setKey('YOUR_API_KEY')->setSecret('YOUR_API_SECRET');


$apiInstance = new GateApi\Api\WalletApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

try {
    $result = $apiInstance->getTradeFee();
    print_r($result);
} catch (GateApi\GateApiException $e) {
    echo "Gate API Exception: label: {$e->getLabel()}, message: {$e->getMessage()}" . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception when calling WalletApi->getTradeFee: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

This endpoint does not need any parameter.

### Return type

[**\GateApi\Model\TradeFee**](../Model/TradeFee.md)

### Authorization

[apiv4](../../README.md#apiv4)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints)
[[Back to Model list]](../../README.md#documentation-for-models)
[[Back to README]](../../README.md)

