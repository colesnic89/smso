<?php

namespace SMSO\Model;

use stdClass;

/**
 * Class MessageStatusDataResponse
 * @package SMSO\Model
 */
class MessageStatusData
{

    /**
     * @var string
     */
    private $status;

    /**
     * @var string|null
     */
    private $sent_at;

    /**
     * @var string|null
     */
    private $delivered_at;

    /**
     * @var MessageStatusDataReceiver
     */
    private $receiver;

    /**
     * @param stdClass $data
     * @return static
     */
    public static function create(stdClass $data): self
    {
        return new static($data->status, $data->sent_at, $data->delivered_at, $data->receiver);
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string|null
     */
    public function getSentAt(): ?string
    {
        return $this->sent_at;
    }

    /**
     * @return string|null
     */
    public function getDeliveredAt(): ?string
    {
        return $this->delivered_at;
    }

    /**
     * @return MessageStatusDataReceiver
     */
    public function getReceiver(): MessageStatusDataReceiver
    {
        return $this->receiver;
    }

    /**
     * MessageStatusData constructor.
     *
     * @param string $status
     * @param string|null $sent_at
     * @param string|null $delivered_at
     * @param stdClass $receiver
     */
    private function __construct(string $status, ?string $sent_at, ?string $delivered_at, stdClass $receiver)
    {
        $this->status = $status;
        $this->sent_at = $sent_at;
        $this->delivered_at = $delivered_at;
        $this->receiver = MessageStatusDataReceiver::create($receiver);
    }

}
