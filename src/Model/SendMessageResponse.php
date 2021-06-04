<?php

namespace SMSO\Model;

use stdClass;

/**
 * Class SendMessageResponse
 * @package SMSO\Model
 */
class SendMessageResponse
{

    /**
     * @var int
     */
    private $status;

    /**
     * @var string
     */
    private $responseToken;

    /**
     * @param stdClass $data
     * @return static
     */
    public static function create(stdClass $data): self
    {
        return new static($data->status, $data->responseToken);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getResponseToken(): string
    {
        return $this->responseToken;
    }

    /**
     * SendMessageResponse constructor.
     *
     * @param int $status
     * @param string $responseToken
     */
    private function __construct(int $status, string $responseToken)
    {
        $this->status = $status;
        $this->responseToken = $responseToken;
    }

}
