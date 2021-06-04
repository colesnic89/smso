<?php

namespace SMSO\Model;

use stdClass;

/**
 * Class MessageStatusResponse
 * @package SMSO\Model
 */
class MessageStatusResponse
{

    /**
     * @var int
     */
    private $status;

    /**
     * @var MessageStatusData
     */
    private $data;

    /**
     * @param stdClass $data
     * @return static
     */
    public static function create(stdClass $data): self
    {
        return new static($data->status, $data->data);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return MessageStatusData
     */
    public function getData(): MessageStatusData
    {
        return $this->data;
    }

    /**
     * MessageStatusResponse constructor.
     *
     * @param int $status
     * @param stdClass $data
     */
    private function __construct(int $status, stdClass $data)
    {
        $this->status = $status;
        $this->data = MessageStatusData::create($data);
    }

}
