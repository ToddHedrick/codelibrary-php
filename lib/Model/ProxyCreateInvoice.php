<?php
/**
 * ProxyCreateInvoice
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
 * ProxyCreateInvoice Class Doc Comment
 *
 * @category    Class */
/**
 * @package     Swagger\Client
 * @author      http://github.com/swagger-api/swagger-codegen
 * @license     http://www.apache.org/licenses/LICENSE-2.0 Apache License v2
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class ProxyCreateInvoice implements ArrayAccess
{
    /**
      * The original name of the model.
      * @var string
      */
    protected static $swaggerModelName = 'ProxyCreateInvoice';

    /**
      * Array of property to type mappings. Used for (de)serialization
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account_id' => 'string',
        'adjustment_amount' => 'double',
        'body' => 'string',
        'credit_balance_adjustment_amount' => 'double',
        'includes_one_time' => 'bool',
        'includes_recurring' => 'bool',
        'includes_usage' => 'bool',
        'invoice_date' => '\DateTime',
        'payment_amount' => 'double',
        'refund_amount' => 'double',
        'target_date' => '\DateTime',
        'tax_amount' => 'double',
        'tax_exempt_amount' => 'double'
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
        'body' => 'Body',
        'credit_balance_adjustment_amount' => 'CreditBalanceAdjustmentAmount',
        'includes_one_time' => 'IncludesOneTime',
        'includes_recurring' => 'IncludesRecurring',
        'includes_usage' => 'IncludesUsage',
        'invoice_date' => 'InvoiceDate',
        'payment_amount' => 'PaymentAmount',
        'refund_amount' => 'RefundAmount',
        'target_date' => 'TargetDate',
        'tax_amount' => 'TaxAmount',
        'tax_exempt_amount' => 'TaxExemptAmount'
    ];


    /**
     * Array of attributes to setter functions (for deserialization of responses)
     * @var string[]
     */
    protected static $setters = [
        'account_id' => 'setAccountId',
        'adjustment_amount' => 'setAdjustmentAmount',
        'body' => 'setBody',
        'credit_balance_adjustment_amount' => 'setCreditBalanceAdjustmentAmount',
        'includes_one_time' => 'setIncludesOneTime',
        'includes_recurring' => 'setIncludesRecurring',
        'includes_usage' => 'setIncludesUsage',
        'invoice_date' => 'setInvoiceDate',
        'payment_amount' => 'setPaymentAmount',
        'refund_amount' => 'setRefundAmount',
        'target_date' => 'setTargetDate',
        'tax_amount' => 'setTaxAmount',
        'tax_exempt_amount' => 'setTaxExemptAmount'
    ];


    /**
     * Array of attributes to getter functions (for serialization of requests)
     * @var string[]
     */
    protected static $getters = [
        'account_id' => 'getAccountId',
        'adjustment_amount' => 'getAdjustmentAmount',
        'body' => 'getBody',
        'credit_balance_adjustment_amount' => 'getCreditBalanceAdjustmentAmount',
        'includes_one_time' => 'getIncludesOneTime',
        'includes_recurring' => 'getIncludesRecurring',
        'includes_usage' => 'getIncludesUsage',
        'invoice_date' => 'getInvoiceDate',
        'payment_amount' => 'getPaymentAmount',
        'refund_amount' => 'getRefundAmount',
        'target_date' => 'getTargetDate',
        'tax_amount' => 'getTaxAmount',
        'tax_exempt_amount' => 'getTaxExemptAmount'
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
        $this->container['body'] = isset($data['body']) ? $data['body'] : null;
        $this->container['credit_balance_adjustment_amount'] = isset($data['credit_balance_adjustment_amount']) ? $data['credit_balance_adjustment_amount'] : null;
        $this->container['includes_one_time'] = isset($data['includes_one_time']) ? $data['includes_one_time'] : null;
        $this->container['includes_recurring'] = isset($data['includes_recurring']) ? $data['includes_recurring'] : null;
        $this->container['includes_usage'] = isset($data['includes_usage']) ? $data['includes_usage'] : null;
        $this->container['invoice_date'] = isset($data['invoice_date']) ? $data['invoice_date'] : null;
        $this->container['payment_amount'] = isset($data['payment_amount']) ? $data['payment_amount'] : null;
        $this->container['refund_amount'] = isset($data['refund_amount']) ? $data['refund_amount'] : null;
        $this->container['target_date'] = isset($data['target_date']) ? $data['target_date'] : null;
        $this->container['tax_amount'] = isset($data['tax_amount']) ? $data['tax_amount'] : null;
        $this->container['tax_exempt_amount'] = isset($data['tax_exempt_amount']) ? $data['tax_exempt_amount'] : null;
    }

    /**
     * show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalid_properties = [];
        if ($this->container['account_id'] === null) {
            $invalid_properties[] = "'account_id' can't be null";
        }
        if ($this->container['adjustment_amount'] === null) {
            $invalid_properties[] = "'adjustment_amount' can't be null";
        }
        if ($this->container['body'] === null) {
            $invalid_properties[] = "'body' can't be null";
        }
        if ($this->container['credit_balance_adjustment_amount'] === null) {
            $invalid_properties[] = "'credit_balance_adjustment_amount' can't be null";
        }
        if ($this->container['payment_amount'] === null) {
            $invalid_properties[] = "'payment_amount' can't be null";
        }
        if ($this->container['refund_amount'] === null) {
            $invalid_properties[] = "'refund_amount' can't be null";
        }
        if ($this->container['tax_amount'] === null) {
            $invalid_properties[] = "'tax_amount' can't be null";
        }
        if ($this->container['tax_exempt_amount'] === null) {
            $invalid_properties[] = "'tax_exempt_amount' can't be null";
        }
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
        if ($this->container['account_id'] === null) {
            return false;
        }
        if ($this->container['adjustment_amount'] === null) {
            return false;
        }
        if ($this->container['body'] === null) {
            return false;
        }
        if ($this->container['credit_balance_adjustment_amount'] === null) {
            return false;
        }
        if ($this->container['payment_amount'] === null) {
            return false;
        }
        if ($this->container['refund_amount'] === null) {
            return false;
        }
        if ($this->container['tax_amount'] === null) {
            return false;
        }
        if ($this->container['tax_exempt_amount'] === null) {
            return false;
        }
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