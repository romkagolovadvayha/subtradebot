# # SubAccountTransfer

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**currency** | **string** | Transfer currency name | 
**sub_account** | **string** | Sub account user ID | 
**direction** | **string** | Transfer direction. to - transfer into sub account; from - transfer out from sub account | 
**amount** | **string** | Transfer amount | 
**uid** | **string** | Main account user ID | [optional] [readonly] 
**timest** | **string** | Transfer timestamp | [optional] [readonly] 
**source** | **string** | Where the operation is initiated from | [optional] [readonly] 
**sub_account_type** | **string** | Target sub user&#39;s account. &#x60;spot&#x60; - spot account, &#x60;futures&#x60; - perpetual contract account | [optional] [default to 'spot']

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)
