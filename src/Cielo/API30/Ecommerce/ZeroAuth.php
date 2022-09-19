<?php

namespace Cielo\API30\Ecommerce;

/**
 * Class ZeroAuth
 *
 * @package Cielo\API30\Ecommerce
 */
class ZeroAuth implements \JsonSerializable, CieloSerializable
{
    /**
     * @var boolean $valid
     */
    private $valid;

    /**
     * @var string $returnCode
     */
    private $returnCode;

    /**
     * @var string $returnMessage
     */
    private $returnMessage;

    /**
     * @param string $json
     *
     * @return ZeroAuth
     */
    public static function fromJson($json)
    {
        $object = \json_decode($json);
        $result = new ZeroAuth();
        $result->populate($object);

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function populate(\stdClass $data)
    {
        $this->valid         = isset($data->Valid) ? $data->Valid : false;
        $this->returnCode    = isset($data->ReturnCode) ? $data->ReturnCode : null;
        $this->returnMessage = isset($data->ReturnMessage) ? $data->ReturnMessage : null;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * @return mixed
     */
    public function getCardNumber()
    {
        return $this->cardNumber;
    }

    /**
     * @return mixed
     */
    public function getValid()
    {
        return $this->valid;
    }

    /**
     * @param $valid
     *
     * @return $this
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturnCode()
    {
        return $this->returnCode;
    }

    /**
     * @param $returnCode
     *
     * @return $this
     */
    public function setReturnCode($returnCode)
    {
        $this->returnCode = $returnCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReturnMessage()
    {
        return $this->returnMessage;
    }

    /**
     * @param $returnMessage
     *
     * @return $this
     */
    public function setReturnMessage($returnMessage)
    {
        $this->returnMessage = $returnMessage;

        return $this;
    }
}
