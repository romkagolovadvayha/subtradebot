# # Loan

## Properties

Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | Loan ID | [optional] [readonly] 
**create_time** | **string** | Creation time | [optional] [readonly] 
**expire_time** | **string** | Repay time of the loan. No value will be returned for lending loan | [optional] [readonly] 
**status** | **string** | Loan status  open - not fully loaned loaned - all loaned out for lending loan; loaned in for borrowing side finished - loan is finished, either being all repaid or cancelled by the lender auto_repaid - automatically repaid by the system | [optional] [readonly] 
**side** | **string** | Loan side | 
**currency** | **string** | Loan currency | 
**rate** | **string** | Loan rate. Only rates in [0.0002, 0.002] are supported.  Not required in lending. Market rate calculated from recent rates will be used if not set | [optional] 
**amount** | **string** | Loan amount | 
**days** | **int** | Loan days | 
**auto_renew** | **bool** | Auto renew the loan on expiration | [optional] [default to false]
**currency_pair** | **string** | Currency pair. Required for borrowing side | [optional] 
**left** | **string** | Amount not lending out | [optional] [readonly] 
**repaid** | **string** | Repaid amount | [optional] [readonly] 
**paid_interest** | **string** | Repaid interest | [optional] [readonly] 
**unpaid_interest** | **string** | Interest not repaid | [optional] [readonly] 
**fee_rate** | **string** | Loan fee rate | [optional] 
**orig_id** | **string** | Original loan ID if the loan is auto-renewed. Equal to &#x60;id&#x60; if not | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)
