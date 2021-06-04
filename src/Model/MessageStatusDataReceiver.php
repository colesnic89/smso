<?php

namespace SMSO\Model;

use stdClass;

/**
 * Class MessageStatusDataReceiver
 * @package SMSO\Model
 */
class MessageStatusDataReceiver
{

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $mcc;

    /**
     * @var string
     */
    private $mnc;

    /**
     * @param stdClass $data
     * @return static
     */
    public static function create(stdClass $data): self
    {
        return new static($data->number, $data->mcc, $data->mnc);
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getMcc(): string
    {
        return $this->mcc;
    }

    /**
     * @return string
     */
    public function getMnc(): string
    {
        return $this->mnc;
    }

    /**
     * MessageStatusDataReceiver constructor.
     *
     * @param string $number
     * @param string $mcc
     * @param string $mnc
     */
    private function __construct(string $number, string $mcc, string $mnc)
    {
        $this->number = $number;
        $this->mcc = $mcc;
        $this->mnc = $mnc;
    }

}
