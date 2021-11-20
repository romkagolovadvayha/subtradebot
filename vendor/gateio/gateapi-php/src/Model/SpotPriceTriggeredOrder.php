<?php
/**
 * SpotPriceTriggeredOrder
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
 * SpotPriceTriggeredOrder Class Doc Comment
 *
 * @category    Class
 * @description Spot order detail
 * @package     GateApi
 * @author      GateIO
 * @link        https://www.gate.io
 */
class SpotPriceTriggeredOrder implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SpotPriceTriggeredOrder';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'trigger' => '\GateApi\Model\SpotPriceTrigger',
        'put' => '\GateApi\Model\SpotPricePutOrder',
        'id' => 'int',
        'user' => 'int',
        'market' => 'string',
        'ctime' => 'double',
        'ftime' => 'double',
        'fired_order_id' => 'int',
        'status' => 'string',
        'reason' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'trigger' => null,
        'put' => null,
        'id' => 'int64',
        'user' => null,
        'market' => null,
        'ctime' => 'double',
        'ftime' => 'double',
        'fired_order_id' => 'int64',
        'status' => null,
        'reason' => null
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
        'trigger' => 'trigger',
        'put' => 'put',
        'id' => 'id',
        'user' => 'user',
        'market' => 'market',
        'ctime' => 'ctime',
        'ftime' => 'ftime',
        'fired_order_id' => 'fired_order_id',
        'status' => 'status',
        'reason' => 'reason'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'trigger' => 'setTrigger',
        'put' => 'setPut',
        'id' => 'setId',
        'user' => 'setUser',
        'market' => 'setMarket',
        'ctime' => 'setCtime',
        'ftime' => 'setFtime',
        'fired_order_id' => 'setFiredOrderId',
        'status' => 'setStatus',
        'reason' => 'setReason'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'trigger' => 'getTrigger',
        'put' => 'getPut',
        'id' => 'getId',
        'user' => 'getUser',
        'market' => 'getMarket',
        'ctime' => 'getCtime',
        'ftime' => 'getFtime',
        'fired_order_id' => 'getFiredOrderId',
        'status' => 'getStatus',
        'reason' => 'getReason'
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
        $this->container['trigger'] = isset($data['trigger']) ? $data['trigger'] : null;
        $this->container['put'] = isset($data['put']) ? $data['put'] : null;
        $this->container['id'] = isset($data['id']) ? $data['id'] : null;
        $this->container['user'] = isset($data['user']) ? $data['user'] : null;
        $this->container['market'] = isset($data['market']) ? $data['market'] : null;
        $this->container['ctime'] = isset($data['ctime']) ? $data['ctime'] : null;
        $this->container['ftime'] = isset($data['ftime']) ? $data['ftime'] : null;
        $this->container['fired_order_id'] = isset($data['fired_order_id']) ? $data['fired_order_id'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
        $this->container['reason'] = isset($data['reason']) ? $data['reason'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['trigger'] === null) {
            $invalidProperties[] = "'trigger' can't be null";
        }
        if ($this->container['put'] === null) {
            $invalidProperties[] = "'put' can't be null";
        }
        if ($this->container['market'] === null) {
            $invalidProperties[] = "'market' can't be null";
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
     * Gets trigger
     *
     * @return \GateApi\Model\SpotPriceTrigger
     */
    public function getTrigger()
    {
        return $this->container['trigger'];
    }

    /**
     * Sets trigger
     *
     * @param \GateApi\Model\SpotPriceTrigger $trigger trigger
     *
     * @return $this
     */
    public function setTrigger($trigger)
    {
        $this->container['trigger'] = $trigger;

        return $this;
    }

    /**
     * Gets put
     *
     * @return \GateApi\Model\SpotPricePutOrder
     */
    public function getPut()
    {
        return $this->container['put'];
    }

    /**
     * Sets put
     *
     * @param \GateApi\Model\SpotPricePutOrder $put put
     *
     * @return $this
     */
    public function setPut($put)
    {
        $this->container['put'] = $put;

        return $this;
    }

    /**
     * Gets id
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param int|null $id Auto order ID
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets user
     *
     * @return int|null
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param int|null $user User ID
     *
     * @return $this
     */
    public function setUser($user)
    {
        $this->container['user'] = $user;

        return $this;
    }

    /**
     * Gets market
     *
     * @return string
     */
    public function getMarket()
    {
        return $this->container['market'];
    }

    /**
     * Sets market
     *
     * @param string $market Currency pair
     *
     * @return $this
     */
    public function setMarket($market)
    {
        $this->container['market'] = $market;

        return $this;
    }

    /**
     * Gets ctime
     *
     * @return double|null
     */
    public function getCtime()
    {
        return $this->container['ctime'];
    }

    /**
     * Sets ctime
     *
     * @param double|null $ctime Creation time
     *
     * @return $this
     */
    public function setCtime($ctime)
    {
        $this->container['ctime'] = $ctime;

        return $this;
    }

    /**
     * Gets ftime
     *
     * @return double|null
     */
    public function getFtime()
    {
        return $this->container['ftime'];
    }

    /**
     * Sets ftime
     *
     * @param double|null $ftime Finished time
     *
     * @return $this
     */
    public function setFtime($ftime)
    {
        $this->container['ftime'] = $ftime;

        return $this;
    }

    /**
     * Gets fired_order_id
     *
     * @return int|null
     */
    public function getFiredOrderId()
    {
        return $this->container['fired_order_id'];
    }

    /**
     * Sets fired_order_id
     *
     * @param int|null $fired_order_id ID of the newly created order on condition triggered
     *
     * @return $this
     */
    public function setFiredOrderId($fired_order_id)
    {
        $this->container['fired_order_id'] = $fired_order_id;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status Status  - open: open - cancelled: being manually cancelled - finish: successfully executed - failed: failed to execute - expired - expired
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets reason
     *
     * @return string|null
     */
    public function getReason()
    {
        return $this->container['reason'];
    }

    /**
     * Sets reason
     *
     * @param string|null $reason Extra messages of how order is finished
     *
     * @return $this
     */
    public function setReason($reason)
    {
        $this->container['reason'] = $reason;

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


