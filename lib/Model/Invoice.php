<?php
/**
 * Invoice
 *
 * PHP version 5
 *
 * @category Class
 * @package  Swagger\Client
 * @author   http://github.com/swagger-api/swagger-codegen
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Zuora API Reference
 *
 * # Introduction  Welcome to the reference for the Zuora REST API!  <a href=\"http://en.wikipedia.org/wiki/REST_API\" target=\"_blank\">REST</a> is a web-service protocol that lends itself to rapid development by using everyday HTTP and JSON technology.  The Zuora REST API provides a broad set of operations and resources that:  * Enable Web Storefront integration between your websites. * Support self-service subscriber sign-ups and account management. * Process revenue schedules through custom revenue rule models.  ## Endpoints  The Zuora REST services are provided via the following endpoints.  | Service                 | Base URL for REST Endpoints                                                                                                                                         | |-------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------| | Production REST service | https://rest.zuora.com/v1                                                                                                                                           | | Sandbox REST service    | https://rest.apisandbox.zuora.com/v1                                                                                                                                |  The production service provides access to your live user data. The sandbox environment is a good place to test your code without affecting real-world data. To use it, you must be provisioned with a sandbox tenant - your Zuora representative can help with this if needed.  ## Accessing the API  If you have a Zuora tenant, you already have access the the API.  If you don't have a Zuora tenant, go to <a href=\"https://www.zuora.com/resource/zuora-test-drive\" target=\"_blank\">https://www.zuora.com/resource/zuora-test-drive</a> and sign up for a trial tenant. The tenant comes with seed data, such as a sample product catalog.   We recommend that you <a href=\"https://knowledgecenter.zuora.com/CF_Users_and_Administrators/A_Administrator_Settings/Manage_Users/Create_an_API_User\" target=\"_blank\">create an API user</a> specifically for making API calls. Don't log in to the Zuora UI with this account. Logging in to the UI enables a security feature that periodically expires the account's password, which may eventually cause authentication failures with the API. Note that a user role does not have write access to Zuora REST services unless it has the API Write Access permission as described in those instructions.   # Authentication  There are three ways to authenticate:  * Use an authorization cookie. The cookie authorizes the user to make calls to the REST API for the duration specified in  **Administration > Security Policies > Session timeout**. The cookie expiration time is reset with this duration after every call to the REST API. To obtain a cookie, call the REST  `connections` resource with the following API user information:     *   ID     *   password     *   entity Id or entity name (Only for [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity \"Multi-entity\"). See \"Entity Id and Entity Name\" below for more information.)  *   Include the following parameters in the request header, which re-authenticates the user with each request:     *   `apiAccessKeyId`     *   `apiSecretAccessKey`     *   `entityId` or `entityName` (Only for [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity \"Multi-entity\"). See \"Entity Id and Entity Name\" below for more information.) *   For CORS-enabled APIs only: Include a 'single-use' token in the request header, which re-authenticates the user with each request. See below for more details.   ## Entity Id and Entity Name  The `entityId` and `entityName`  parameters are only used for  [Zuora Multi-entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity).  The  `entityId` parameter specifies the Id of the entity that you want to access. The `entityName` parameter specifies the [name of the entity](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity/B_Introduction_to_Entity_and_Entity_Hierarchy#Name_and_Display_Name \"Introduction to Entity and Entity Hierarchy\") that you want to access. Note that you must have permission to access the entity. You can get the entity Id and entity name through the REST GET Entities call.  You can specify either the  `entityId` or `entityName` parameter in the authentication to access and view an entity.  *   If both `entityId` and `entityName` are specified in the authentication, an error occurs.  *   If neither  `entityId` nor  `entityName` is specified in the authentication, you will log in to the entity in which your user account is created.   See [API User Authentication](https://knowledgecenter.zuora.com/BB_Introducing_Z_Business/Multi-entity/A_Overview_of_Multi-entity#API_User_Authentication \"Zuora Multi-entity\") for more information.  ## Token Authentication for CORS-Enabled APIs  The CORS mechanism enables REST API calls to Zuora to be made directly from your customer's browser, with all credit card and security information transmitted directly to Zuora. This minimizes your PCI compliance burden, allows you to implement advanced validation on your payment forms, and makes your payment forms look just like any other part of your website.  For security reasons, instead of using cookies, an API request via CORS uses **tokens** for authentication.  The token method of authentication is only designed for use with requests that must originate from your customer's browser; **it should not be considered a replacement to the existing cookie authentication** mechanism.  See [Zuora CORS REST ](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/G_CORS_REST \"Zuora CORS REST\")for details on how CORS works and how you can begin to implement customer calls to the Zuora REST APIs. See  [HMAC Signatures](/BC_Developers/REST_API/B_REST_API_reference/HMAC_Signatures \"HMAC Signatures\") for details on the HMAC method that returns the authentication token.    # Requests and Responses   ## Request IDs  As a general rule, when asked to supply a \"key\" for an account or subscription (accountKey, account-key, subscriptionKey, subscription-key), you can provide either the actual ID or the number of the entity.  ## HTTP Request Body  Most of the parameters and data accompanying your requests will be contained in the body of the HTTP request.  The Zuora REST API accepts JSON in the HTTP request body.  No other data format (e.g., XML) is supported.   ## Testing a Request  Use a third party client, such as Postman or Advanced REST Client, to test the Zuora REST API.  You can test the Zuora REST API from the Zuora sandbox or  production service. If connecting to the production service, bear in mind that you are working with your live production data, not sample data or test data.  ## Testing with Credit Cards  Sooner or later it will probably be necessary to test some transactions that involve credit cards. For suggestions on how to handle this, see [Going Live With Your Payment Gateway](https://knowledgecenter.zuora.com/CB_Billing/M_Payment_Gateways/C_Managing_Payment_Gateways/B_Going_Live_Payment_Gateways#Testing_with_Credit_Cards \"C_Zuora_User_Guides/A_Billing_and_Payments/M_Payment_Gateways/C_Managing_Payment_Gateways/B_Going_Live_Payment_Gateways#Testing_with_Credit_Cards\").       ## Error Handling  Responses and error codes are detailed in [Responses and errors](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/3_Responses_and_errors \"Responses and errors\").    # Pagination  When retrieving information (using GET methods), the optional `pageSize` query parameter sets the maximum number of rows to return in a response. The maximum is `40`; larger values are treated as `40`. If this value is empty or invalid, `pageSize` typically defaults to `10`.  The default value for the maximum number of rows retrieved can be overridden at the method level.  If more rows are available, the response will include a `nextPage` element, which contains a URL for requesting the next page.  If this value is not provided, no more rows are available. No \"previous page\" element is explicitly provided; to support backward paging, use the previous call.  ## Array Size  For data items that are not paginated, the REST API supports arrays of up to 300 rows.  Thus, for instance, repeated pagination can retrieve thousands of customer accounts, but within any account an array of no more than 300 rate plans is returned.   # API Versions  The Zuora REST API is in version control. Versioning ensures that Zuora REST API changes are backward compatible. Zuora uses a major and minor version nomenclature to manage changes. By specifying a version in a REST request, you can get expected responses regardless of future changes to the API.   ## Major Version  The major version number of the REST API appears in the REST URL. Currently, Zuora only supports the **v1** major version. For example,  `POST https://rest.zuora.com/v1/subscriptions` .   ## Minor Version  Zuora uses minor versions for the REST API to control small changes. For example, a field in a REST method is deprecated and a new field is used to replace it.   Some fields in the REST methods are supported as of minor versions. If a field is not noted with a minor version, this field is available for all minor versions. If a field is noted with a minor version, this field is in version control. You must specify the supported minor version in the request header to process without an error.   If a field is in version control, it is either with a minimum minor version or a maximum minor version, or both of them. You can only use this field with the minor version between the minimum and the maximum minor versions. For example, the  `invoiceCollect` field in the POST Subscription method is in version control and its maximum minor version is 189.0. You can only use this field with the minor version 189.0 or earlier.  The supported minor versions are not serial, see [Zuora REST API Minor Version History](https://knowledgecenter.zuora.com/DC_Developers/REST_API/A_REST_basics/Zuora_REST_API_Minor_Version_History \"Zuora REST API Minor Version History\") for the fields and their supported minor versions. In our REST API documentation, if a field or feature requires a minor version number, we note that in the field description.  You only need to specify the version number when you use the fields require a minor version. To specify the minor version, set the `zuora-version` parameter to the minor version number in the request header for the request call. For example, the `collect` field is in 196.0 minor version. If you want to use this field for the POST Subscription method, set the  `zuora-version` parameter to `196.0` in the request header. The `zuora-version` parameter is case sensitive.   For all the REST API fields, by default, if the minor version is not specified in the request header, Zuora will use the minimum minor version of the REST API to avoid breaking your integration.     # Zuora Object Model The following diagram presents a high-level view of the key Zuora objects. Click the image to open it in a new tab to resize it.  <a href=\"https://www.zuora.com/wp-content/uploads/2016/10/ZuoraERD-compressor-1.jpeg\" target=\"_blank\"><img src=\"https://www.zuora.com/wp-content/uploads/2016/10/ZuoraERD-compressor-1.jpeg\" alt=\"Zuora Object Model Diagram\"></a>
 *
 * OpenAPI spec version: 0.0.1
 * Contact: docs@zuora.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace Swagger\Client\Model;

use \ArrayAccess;

/**
 * Invoice Class Doc Comment
 *
 * @category    Class */
/**
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class Invoice implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'Invoice';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account_id' => 'string',
        'adjustment_amount' => 'double',
        'amount' => 'double',
        'amount_without_tax' => 'double',
        'balance' => 'double',
        'bill_run_id' => 'string',
        'body' => 'string',
        'comments' => 'string',
        'created_by_id' => 'string',
        'created_date' => '\DateTime',
        'credit_balance_adjustment_amount' => 'double',
        'due_date' => '\DateTime',
        'includes_one_time' => 'bool',
        'includes_recurring' => 'bool',
        'includes_usage' => 'bool',
        'invoice_date' => '\DateTime',
        'invoice_number' => 'string',
        'last_email_sent_date' => '\DateTime',
        'payment_amount' => 'double',
        'posted_by' => 'string',
        'posted_date' => '\DateTime',
        'refund_amount' => 'double',
        'regenerate_invoice_pdf' => 'bool',
        'status' => 'string',
        'target_date' => '\DateTime',
        'tax_amount' => 'double',
        'tax_exempt_amount' => 'double',
        'transferred_to_accounting' => 'string',
        'updated_by_id' => 'string',
        'updated_date' => '\DateTime'
    ];

    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of attributes where the key is the local name, and the value is the original name
     * @var string[]
     */
    protected static $attributeMap = [
        'account_id' => 'AccountId',
        'adjustment_amount' => 'AdjustmentAmount',
        'amount' => 'Amount',
        'amount_without_tax' => 'AmountWithoutTax',
        'balance' => 'Balance',
        'bill_run_id' => 'BillRunId',
        'body' => 'Body',
        'comments' => 'Comments',
        'created_by_id' => 'CreatedById',
        'created_date' => 'CreatedDate',
        'credit_balance_adjustment_amount' => 'CreditBalanceAdjustmentAmount',
        'due_date' => 'DueDate',
        'includes_one_time' => 'IncludesOneTime',
        'includes_recurring' => 'IncludesRecurring',
        'includes_usage' => 'IncludesUsage',
        'invoice_date' => 'InvoiceDate',
        'invoice_number' => 'InvoiceNumber',
        'last_email_sent_date' => 'LastEmailSentDate',
        'payment_amount' => 'PaymentAmount',
        'posted_by' => 'PostedBy',
        'posted_date' => 'PostedDate',
        'refund_amount' => 'RefundAmount',
        'regenerate_invoice_pdf' => 'RegenerateInvoicePDF',
        'status' => 'Status',
        'target_date' => 'TargetDate',
        'tax_amount' => 'TaxAmount',
        'tax_exempt_amount' => 'TaxExemptAmount',
        'transferred_to_accounting' => 'TransferredToAccounting',
        'updated_by_id' => 'UpdatedById',
        'updated_date' => 'UpdatedDate'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'adjustment_amount' => 'setAdjustmentAmount',
        'amount' => 'setAmount',
        'amount_without_tax' => 'setAmountWithoutTax',
        'balance' => 'setBalance',
        'bill_run_id' => 'setBillRunId',
        'body' => 'setBody',
        'comments' => 'setComments',
        'created_by_id' => 'setCreatedById',
        'created_date' => 'setCreatedDate',
        'credit_balance_adjustment_amount' => 'setCreditBalanceAdjustmentAmount',
        'due_date' => 'setDueDate',
        'includes_one_time' => 'setIncludesOneTime',
        'includes_recurring' => 'setIncludesRecurring',
        'includes_usage' => 'setIncludesUsage',
        'invoice_date' => 'setInvoiceDate',
        'invoice_number' => 'setInvoiceNumber',
        'last_email_sent_date' => 'setLastEmailSentDate',
        'payment_amount' => 'setPaymentAmount',
        'posted_by' => 'setPostedBy',
        'posted_date' => 'setPostedDate',
        'refund_amount' => 'setRefundAmount',
        'regenerate_invoice_pdf' => 'setRegenerateInvoicePdf',
        'status' => 'setStatus',
        'target_date' => 'setTargetDate',
        'tax_amount' => 'setTaxAmount',
        'tax_exempt_amount' => 'setTaxExemptAmount',
        'transferred_to_accounting' => 'setTransferredToAccounting',
        'updated_by_id' => 'setUpdatedById',
        'updated_date' => 'setUpdatedDate'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'adjustment_amount' => 'getAdjustmentAmount',
        'amount' => 'getAmount',
        'amount_without_tax' => 'getAmountWithoutTax',
        'balance' => 'getBalance',
        'bill_run_id' => 'getBillRunId',
        'body' => 'getBody',
        'comments' => 'getComments',
        'created_by_id' => 'getCreatedById',
        'created_date' => 'getCreatedDate',
        'credit_balance_adjustment_amount' => 'getCreditBalanceAdjustmentAmount',
        'due_date' => 'getDueDate',
        'includes_one_time' => 'getIncludesOneTime',
        'includes_recurring' => 'getIncludesRecurring',
        'includes_usage' => 'getIncludesUsage',
        'invoice_date' => 'getInvoiceDate',
        'invoice_number' => 'getInvoiceNumber',
        'last_email_sent_date' => 'getLastEmailSentDate',
        'payment_amount' => 'getPaymentAmount',
        'posted_by' => 'getPostedBy',
        'posted_date' => 'getPostedDate',
        'refund_amount' => 'getRefundAmount',
        'regenerate_invoice_pdf' => 'getRegenerateInvoicePdf',
        'status' => 'getStatus',
        'target_date' => 'getTargetDate',
        'tax_amount' => 'getTaxAmount',
        'tax_exempt_amount' => 'getTaxExemptAmount',
        'transferred_to_accounting' => 'getTransferredToAccounting',
        'updated_by_id' => 'getUpdatedById',
        'updated_date' => 'getUpdatedDate'
    ];

    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    public static function setters()
    {
        return self::$setters;
    }

    public static function getters()
    {
        return self::$getters;
    }

    

    

    /**
     * Associative array for storing property values
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     * @param mixed[] $data Associated array of property values initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['account_id'] = isset($data['account_id']) ? $data['account_id'] : null;
        $this->container['adjustment_amount'] = isset($data['adjustment_amount']) ? $data['adjustment_amount'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['amount_without_tax'] = isset($data['amount_without_tax']) ? $data['amount_without_tax'] : null;
        $this->container['balance'] = isset($data['balance']) ? $data['balance'] : null;
        $this->container['bill_run_id'] = isset($data['bill_run_id']) ? $data['bill_run_id'] : null;
        $this->container['body'] = isset($data['body']) ? $data['body'] : null;
        $this->container['comments'] = isset($data['comments']) ? $data['comments'] : null;
        $this->container['created_by_id'] = isset($data['created_by_id']) ? $data['created_by_id'] : null;
        $this->container['created_date'] = isset($data['created_date']) ? $data['created_date'] : null;
        $this->container['credit_balance_adjustment_amount'] = isset($data['credit_balance_adjustment_amount']) ? $data['credit_balance_adjustment_amount'] : null;
        $this->container['due_date'] = isset($data['due_date']) ? $data['due_date'] : null;
        $this->container['includes_one_time'] = isset($data['includes_one_time']) ? $data['includes_one_time'] : null;
        $this->container['includes_recurring'] = isset($data['includes_recurring']) ? $data['includes_recurring'] : null;
        $this->container['includes_usage'] = isset($data['includes_usage']) ? $data['includes_usage'] : null;
        $this->container['invoice_date'] = isset($data['invoice_date']) ? $data['invoice_date'] : null;
        $this->container['invoice_number'] = isset($data['invoice_number']) ? $data['invoice_number'] : null;
        $this->container['last_email_sent_date'] = isset($data['last_email_sent_date']) ? $data['last_email_sent_date'] : null;
        $this->container['payment_amount'] = isset($data['payment_amount']) ? $data['payment_amount'] : null;
        $this->container['posted_by'] = isset($data['posted_by']) ? $data['posted_by'] : null;
        $this->container['posted_date'] = isset($data['posted_date']) ? $data['posted_date'] : null;
        $this->container['refund_amount'] = isset($data['refund_amount']) ? $data['refund_amount'] : null;
        $this->container['regenerate_invoice_pdf'] = isset($data['regenerate_invoice_pdf']) ? $data['regenerate_invoice_pdf'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['target_date'] = isset($data['target_date']) ? $data['target_date'] : null;
        $this->container['tax_amount'] = isset($data['tax_amount']) ? $data['tax_amount'] : null;
        $this->container['tax_exempt_amount'] = isset($data['tax_exempt_amount']) ? $data['tax_exempt_amount'] : null;
        $this->container['transferred_to_accounting'] = isset($data['transferred_to_accounting']) ? $data['transferred_to_accounting'] : null;
        $this->container['updated_by_id'] = isset($data['updated_by_id']) ? $data['updated_by_id'] : null;
        $this->container['updated_date'] = isset($data['updated_date']) ? $data['updated_date'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        return $invalid_properties;
    }

    /**
     * validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properteis are valid
     */
    public function valid()
    {
        return true;
    }


    /**
     * Gets account_id
     * @return string
     */
    public function getAccountId()
    {
        return $this->container['account_id'];
    }

    /**
     * Sets account_id
     * @param string $account_id 
     * @return $this
     */
    public function setAccountId($account_id)
    {
        $this->container['account_id'] = $account_id;

        return $this;
    }

    /**
     * Gets adjustment_amount
     * @return double
     */
    public function getAdjustmentAmount()
    {
        return $this->container['adjustment_amount'];
    }

    /**
     * Sets adjustment_amount
     * @param double $adjustment_amount The amount of the invoice adjustments associated with the invoice. **Character limi**t: 16 **Values**: a valid currency amount
     * @return $this
     */
    public function setAdjustmentAmount($adjustment_amount)
    {
        $this->container['adjustment_amount'] = $adjustment_amount;

        return $this;
    }

    /**
     * Gets amount
     * @return double
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     * @param double $amount The sum of all charges and taxes associated with the invoice. **Character limit**: 16 **Values**: automatically generated
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets amount_without_tax
     * @return double
     */
    public function getAmountWithoutTax()
    {
        return $this->container['amount_without_tax'];
    }

    /**
     * Sets amount_without_tax
     * @param double $amount_without_tax The sum of all charges associated with the invoice. Taxes are excluded from this value. **Character limit**: 16 **Values**: automatically generated
     * @return $this
     */
    public function setAmountWithoutTax($amount_without_tax)
    {
        $this->container['amount_without_tax'] = $amount_without_tax;

        return $this;
    }

    /**
     * Gets balance
     * @return double
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     * @param double $balance The remaining balance of the invoice after all payments, adjustments, and refunds are applied. **Character limit**: 16 **Values**: automatically generated
     * @return $this
     */
    public function setBalance($balance)
    {
        $this->container['balance'] = $balance;

        return $this;
    }

    /**
     * Gets bill_run_id
     * @return string
     */
    public function getBillRunId()
    {
        return $this->container['bill_run_id'];
    }

    /**
     * Sets bill_run_id
     * @param string $bill_run_id The ID of a Bill Run. **Character limit**: 32 **Values**: a BillRun ID
     * @return $this
     */
    public function setBillRunId($bill_run_id)
    {
        $this->container['bill_run_id'] = $bill_run_id;

        return $this;
    }

    /**
     * Gets body
     * @return string
     */
    public function getBody()
    {
        return $this->container['body'];
    }

    /**
     * Sets body
     * @param string $body Required
     * @return $this
     */
    public function setBody($body)
    {
        $this->container['body'] = $body;

        return $this;
    }

    /**
     * Gets comments
     * @return string
     */
    public function getComments()
    {
        return $this->container['comments'];
    }

    /**
     * Sets comments
     * @param string $comments Additional information related to the invoice that a Zuora user added to the invoice. **Character limit**: 255 **Values:** a string of 255 characters or fewer
     * @return $this
     */
    public function setComments($comments)
    {
        $this->container['comments'] = $comments;

        return $this;
    }

    /**
     * Gets created_by_id
     * @return string
     */
    public function getCreatedById()
    {
        return $this->container['created_by_id'];
    }

    /**
     * Sets created_by_id
     * @param string $created_by_id The user ID of the person who created the invoice. If a bill run generated the invoice, then the value is the user ID of person who created the bill run. **Character limit**: 32 **Values**: automatically generated
     * @return $this
     */
    public function setCreatedById($created_by_id)
    {
        $this->container['created_by_id'] = $created_by_id;

        return $this;
    }

    /**
     * Gets created_date
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->container['created_date'];
    }

    /**
     * Sets created_date
     * @param \DateTime $created_date The date when the invoice was generated. **Character limit**: 29 **Values**: automatically generated
     * @return $this
     */
    public function setCreatedDate($created_date)
    {
        $this->container['created_date'] = $created_date;

        return $this;
    }

    /**
     * Gets credit_balance_adjustment_amount
     * @return double
     */
    public function getCreditBalanceAdjustmentAmount()
    {
        return $this->container['credit_balance_adjustment_amount'];
    }

    /**
     * Sets credit_balance_adjustment_amount
     * @param double $credit_balance_adjustment_amount The currency amount of the adjustment applied to the customer's credit balance. **Character limit**: 16 **Values**: a valid currency amount This field is only available if the [Zuora Global Support](http://support.zuora.com/) to enable this feature.
     * @return $this
     */
    public function setCreditBalanceAdjustmentAmount($credit_balance_adjustment_amount)
    {
        $this->container['credit_balance_adjustment_amount'] = $credit_balance_adjustment_amount;

        return $this;
    }

    /**
     * Gets due_date
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->container['due_date'];
    }

    /**
     * Sets due_date
     * @param \DateTime $due_date The date by which the payment for this invoice is due. **Character limit**: 29 **Version notes**: --
     * @return $this
     */
    public function setDueDate($due_date)
    {
        $this->container['due_date'] = $due_date;

        return $this;
    }

    /**
     * Gets includes_one_time
     * @return bool
     */
    public function getIncludesOneTime()
    {
        return $this->container['includes_one_time'];
    }

    /**
     * Sets includes_one_time
     * @param bool $includes_one_time Specifies whether the invoice includes one-time charges. You can use this field only with the `generate()` call for the Invoice object. **Character limit**: 5 **Values**: automatically generated from one of the following: `True` (default), `False`
     * @return $this
     */
    public function setIncludesOneTime($includes_one_time)
    {
        $this->container['includes_one_time'] = $includes_one_time;

        return $this;
    }

    /**
     * Gets includes_recurring
     * @return bool
     */
    public function getIncludesRecurring()
    {
        return $this->container['includes_recurring'];
    }

    /**
     * Sets includes_recurring
     * @param bool $includes_recurring Specifies whether the invoice includes recurring charges. You can use this field only with the `generate() `call for the Invoice object. **Character limit**: 5 **Values**: automatically generated from one of the following: `True` (default), `False`
     * @return $this
     */
    public function setIncludesRecurring($includes_recurring)
    {
        $this->container['includes_recurring'] = $includes_recurring;

        return $this;
    }

    /**
     * Gets includes_usage
     * @return bool
     */
    public function getIncludesUsage()
    {
        return $this->container['includes_usage'];
    }

    /**
     * Sets includes_usage
     * @param bool $includes_usage Specifies whether the invoice includes usage charges. You can use this field only with the `generate() `call for the Invoice object. **Character limit**: 5 **Values**: automatically generated from one of the following: `True `(default), `False`
     * @return $this
     */
    public function setIncludesUsage($includes_usage)
    {
        $this->container['includes_usage'] = $includes_usage;

        return $this;
    }

    /**
     * Gets invoice_date
     * @return \DateTime
     */
    public function getInvoiceDate()
    {
        return $this->container['invoice_date'];
    }

    /**
     * Sets invoice_date
     * @param \DateTime $invoice_date Specifies the date on which to generate the invoice. **Character limit**: 29 **Version notes**: --
     * @return $this
     */
    public function setInvoiceDate($invoice_date)
    {
        $this->container['invoice_date'] = $invoice_date;

        return $this;
    }

    /**
     * Gets invoice_number
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->container['invoice_number'];
    }

    /**
     * Sets invoice_number
     * @param string $invoice_number The unique identification number for the invoice. This number is returned as a string. **Character limit**: 32 **Values**: automatically generated
     * @return $this
     */
    public function setInvoiceNumber($invoice_number)
    {
        $this->container['invoice_number'] = $invoice_number;

        return $this;
    }

    /**
     * Gets last_email_sent_date
     * @return \DateTime
     */
    public function getLastEmailSentDate()
    {
        return $this->container['last_email_sent_date'];
    }

    /**
     * Sets last_email_sent_date
     * @param \DateTime $last_email_sent_date The date when the invoice was last emailed. **Character limit**: 29 **Values**: automatically generated
     * @return $this
     */
    public function setLastEmailSentDate($last_email_sent_date)
    {
        $this->container['last_email_sent_date'] = $last_email_sent_date;

        return $this;
    }

    /**
     * Gets payment_amount
     * @return double
     */
    public function getPaymentAmount()
    {
        return $this->container['payment_amount'];
    }

    /**
     * Sets payment_amount
     * @param double $payment_amount The amount of payments applied to the invoice. **Character limit**: 16 **Value**s: automatically generated
     * @return $this
     */
    public function setPaymentAmount($payment_amount)
    {
        $this->container['payment_amount'] = $payment_amount;

        return $this;
    }

    /**
     * Gets posted_by
     * @return string
     */
    public function getPostedBy()
    {
        return $this->container['posted_by'];
    }

    /**
     * Sets posted_by
     * @param string $posted_by The user ID of the person who moved the invoice to Posted status. **Character limit**: 32 **Values**: automatically generated
     * @return $this
     */
    public function setPostedBy($posted_by)
    {
        $this->container['posted_by'] = $posted_by;

        return $this;
    }

    /**
     * Gets posted_date
     * @return \DateTime
     */
    public function getPostedDate()
    {
        return $this->container['posted_date'];
    }

    /**
     * Sets posted_date
     * @param \DateTime $posted_date The date when the invoice was posted. **Character limit:** 29 **Values**: automatically generated
     * @return $this
     */
    public function setPostedDate($posted_date)
    {
        $this->container['posted_date'] = $posted_date;

        return $this;
    }

    /**
     * Gets refund_amount
     * @return double
     */
    public function getRefundAmount()
    {
        return $this->container['refund_amount'];
    }

    /**
     * Sets refund_amount
     * @param double $refund_amount Specifies the amount of a refund that was applied against an earlier payment on the invoice. **Character limit**: 16 **Values**: automatically generated
     * @return $this
     */
    public function setRefundAmount($refund_amount)
    {
        $this->container['refund_amount'] = $refund_amount;

        return $this;
    }

    /**
     * Gets regenerate_invoice_pdf
     * @return bool
     */
    public function getRegenerateInvoicePdf()
    {
        return $this->container['regenerate_invoice_pdf'];
    }

    /**
     * Sets regenerate_invoice_pdf
     * @param bool $regenerate_invoice_pdf Regenerates a PDF of an invoice that was already generated. Add this field to an `update()` call to regenerate an invoice PDF. Note that when you set the `RegenerateInvoicePDF` field to `true`, you cannot update any other fields in the same `update()` call. Otherwise, you will receive the following `INVALID_VALUE` error: &quot;When field RegenerateInvoicePDF is set to true to regenerate the invoice PDF file, changes on other fields of the invoice are not allowed.&quot; **Character limit**: 5 **Values**: `True`, `False`
     * @return $this
     */
    public function setRegenerateInvoicePdf($regenerate_invoice_pdf)
    {
        $this->container['regenerate_invoice_pdf'] = $regenerate_invoice_pdf;

        return $this;
    }

    /**
     * Gets status
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     * @param string $status The status of the invoice in the system. This status is not the status of the payment of the invoice, just the status of the invoice itself. **Character limit**: 8 **Values**: one of the following:  -  Draft (default, automatically set upon invoice creation)  -  Posted  -  Canceled
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets target_date
     * @return \DateTime
     */
    public function getTargetDate()
    {
        return $this->container['target_date'];
    }

    /**
     * Sets target_date
     * @param \DateTime $target_date This date is used to determine which charges are to be billed. All charges that are to be billed on this date or prior will be included in this bill run. **Character limit**: 29 **Version notes**: --
     * @return $this
     */
    public function setTargetDate($target_date)
    {
        $this->container['target_date'] = $target_date;

        return $this;
    }

    /**
     * Gets tax_amount
     * @return double
     */
    public function getTaxAmount()
    {
        return $this->container['tax_amount'];
    }

    /**
     * Sets tax_amount
     * @param double $tax_amount The total amount of the taxes applied to the invoice. **Character limit**: 16 **Values**: automatically generated
     * @return $this
     */
    public function setTaxAmount($tax_amount)
    {
        $this->container['tax_amount'] = $tax_amount;

        return $this;
    }

    /**
     * Gets tax_exempt_amount
     * @return double
     */
    public function getTaxExemptAmount()
    {
        return $this->container['tax_exempt_amount'];
    }

    /**
     * Sets tax_exempt_amount
     * @param double $tax_exempt_amount The total amount of the invoice that is exempt from taxation. **Character limit**: 16 **Values**: automatically generated
     * @return $this
     */
    public function setTaxExemptAmount($tax_exempt_amount)
    {
        $this->container['tax_exempt_amount'] = $tax_exempt_amount;

        return $this;
    }

    /**
     * Gets transferred_to_accounting
     * @return string
     */
    public function getTransferredToAccounting()
    {
        return $this->container['transferred_to_accounting'];
    }

    /**
     * Sets transferred_to_accounting
     * @param string $transferred_to_accounting Specifies whether or not the invoice was transferred to an external accounting system, such as NetSuite. **Character limit**: 10 **Values**: Processing, Yes, Error, Ignore
     * @return $this
     */
    public function setTransferredToAccounting($transferred_to_accounting)
    {
        $this->container['transferred_to_accounting'] = $transferred_to_accounting;

        return $this;
    }

    /**
     * Gets updated_by_id
     * @return string
     */
    public function getUpdatedById()
    {
        return $this->container['updated_by_id'];
    }

    /**
     * Sets updated_by_id
     * @param string $updated_by_id 
     * @return $this
     */
    public function setUpdatedById($updated_by_id)
    {
        $this->container['updated_by_id'] = $updated_by_id;

        return $this;
    }

    /**
     * Gets updated_date
     * @return \DateTime
     */
    public function getUpdatedDate()
    {
        return $this->container['updated_date'];
    }

    /**
     * Sets updated_date
     * @param \DateTime $updated_date The date when the invoice was last updated. **Character limit**: 29 **Values**: automatically generated
     * @return $this
     */
    public function setUpdatedDate($updated_date)
    {
        $this->container['updated_date'] = $updated_date;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     * @param  integer $offset Offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     * @param  integer $offset Offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     * @param  integer $offset Offset
     * @param  mixed   $value  Value to be set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     * @param  integer $offset Offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this), JSON_PRETTY_PRINT);
        }

        return json_encode(\Swagger\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}
