<?php
/**
 * SubAccountTransfer
 *
 * PHP version 7
 *
 * @category Class
 * @package  GateApi
 * @author   GateIO
 * @link     https://www.gate.io
 */

/**
 * Gate API v4
 *
 * Welcome to Gate.io API  APIv4 provides spot, margin and futures trading operations. There are public APIs to retrieve the real-time market statistics, and private APIs which needs authentication to trade on user's behalf.
 *
 * Contact: support@mail.gate.io
 * Generated by: https://openapi-generator.tech
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * Do not edit the class manually.
 */

namespace GateApi\Model;

use \ArrayAccess;
use \GateApi\ObjectSerializer;

/**
 * SubAccountTransfer Class Doc Comment
 *
 * @category Class
 * @package  GateApi
 * @author   GateIO
 * @link     https://www.gate.io
 */
class SubAccountTransfer implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SubAccountTransfer';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'currency' => 'string',
        'sub_account' => 'string',
        'direction' => 'string',
        'amount' => 'string',
        'uid' => 'string',
        'timest' => 'string',
        'source' => 'string',
        'sub_account_type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'currency' => null,
        'sub_account' => null,
        'direction' => null,
        'amount' => null,
        'uid' => null,
        'timest' => null,
        'source' => null,
        'sub_account_type' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'currency' => 'currency',
        'sub_account' => 'sub_account',
        'direction' => 'direction',
        'amount' => 'amount',
        'uid' => 'uid',
        'timest' => 'timest',
        'source' => 'source',
        'sub_account_type' => 'sub_account_type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'currency' => 'setCurrency',
        'sub_account' => 'setSubAccount',
        'direction' => 'setDirection',
        'amount' => 'setAmount',
        'uid' => 'setUid',
        'timest' => 'setTimest',
        'source' => 'setSource',
        'sub_account_type' => 'setSubAccountType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'currency' => 'getCurrency',
        'sub_account' => 'getSubAccount',
        'direction' => 'getDirection',
        'amount' => 'getAmount',
        'uid' => 'getUid',
        'timest' => 'getTimest',
        'source' => 'getSource',
        'sub_account_type' => 'getSubAccountType'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    const DIRECTION_TO = 'to';
    const DIRECTION_FROM = 'from';
    const SUB_ACCOUNT_TYPE_SPOT = 'spot';
    const SUB_ACCOUNT_TYPE_FUTURES = 'futures';
    

    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getDirectionAllowableValues()
    {
        return [
            self::DIRECTION_TO,
            self::DIRECTION_FROM,
        ];
    }
    
    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSubAccountTypeAllowableValues()
    {
        return [
            self::SUB_ACCOUNT_TYPE_SPOT,
            self::SUB_ACCOUNT_TYPE_FUTURES,
        ];
    }
    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['sub_account'] = isset($data['sub_account']) ? $data['sub_account'] : null;
        $this->container['direction'] = isset($data['direction']) ? $data['direction'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['uid'] = isset($data['uid']) ? $data['uid'] : null;
        $this->container['timest'] = isset($data['timest']) ? $data['timest'] : null;
        $this->container['source'] = isset($data['source']) ? $data['source'] : null;
        $this->container['sub_account_type'] = isset($data['sub_account_type']) ? $data['sub_account_type'] : 'spot';
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['currency'] === null) {
            $invalidProperties[] = "'currency' can't be null";
        }
        if ($this->container['sub_account'] === null) {
            $invalidProperties[] = "'sub_account' can't be null";
        }
        if ($this->container['direction'] === null) {
            $invalidProperties[] = "'direction' can't be null";
        }
        $allowedValues = $this->getDirectionAllowableValues();
        if (!is_null($this->container['direction']) && !in_array($this->container['direction'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'direction', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        if ($this->container['amount'] === null) {
            $invalidProperties[] = "'amount' can't be null";
        }
        $allowedValues = $this->getSubAccountTypeAllowableValues();
        if (!is_null($this->container['sub_account_type']) && !in_array($this->container['sub_account_type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'sub_account_type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency Transfer currency name
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets sub_account
     *
     * @return string
     */
    public function getSubAccount()
    {
        return $this->container['sub_account'];
    }

    /**
     * Sets sub_account
     *
     * @param string $sub_account Sub account user ID
     *
     * @return $this
     */
    public function setSubAccount($sub_account)
    {
        $this->container['sub_account'] = $sub_account;

        return $this;
    }

    /**
     * Gets direction
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->container['direction'];
    }

    /**
     * Sets direction
     *
     * @param string $direction Transfer direction. to - transfer into sub account; from - transfer out from sub account
     *
     * @return $this
     */
    public function setDirection($direction)
    {
        $allowedValues = $this->getDirectionAllowableValues();
        if (!in_array($direction, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'direction', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['direction'] = $direction;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return string
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param string $amount Transfer amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets uid
     *
     * @return string|null
     */
    public function getUid()
    {
        return $this->container['uid'];
    }

    /**
     * Sets uid
     *
     * @param string|null $uid Main account user ID
     *
     * @return $this
     */
    public function setUid($uid)
    {
        $this->container['uid'] = $uid;

        return $this;
    }

    /**
     * Gets timest
     *
     * @return string|null
     */
    public function getTimest()
    {
        return $this->container['timest'];
    }

    /**
     * Sets timest
     *
     * @param string|null $timest Transfer timestamp
     *
     * @return $this
     */
    public function setTimest($timest)
    {
        $this->container['timest'] = $timest;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source Where the operation is initiated from
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets sub_account_type
     *
     * @return string|null
     */
    public function getSubAccountType()
    {
        return $this->container['sub_account_type'];
    }

    /**
     * Sets sub_account_type
     *
     * @param string|null $sub_account_type Target sub user's account. `spot` - spot account, `futures` - perpetual contract account
     *
     * @return $this
     */
    public function setSubAccountType($sub_account_type)
    {
        $allowedValues = $this->getSubAccountTypeAllowableValues();
        if (!is_null($sub_account_type) && !in_array($sub_account_type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'sub_account_type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['sub_account_type'] = $sub_account_type;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
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
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


