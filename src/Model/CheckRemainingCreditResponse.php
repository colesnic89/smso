<?php

namespace SMSO\Model;

use stdClass;

/**
 * Class CheckRemainingCreditResponse
 * @package SMSO\Model
 */
class CheckRemainingCreditResponse
{

    /**
     * @var int
     */
    private $status;

    /**
     * @var float
     */
    private $creditValue;

    /**
     * @param stdClass $data
     * @return $this
     */
    public static function create(stdClass $data): self
    {
        return new static($data->status, $data->credit_value);
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function getCreditValue(): float
    {
        return $this->creditValue;
    }

    /**
     * CheckRemainingCreditResponse constructor.
     *
     * @param int $status
     * @param float $creditValue
     */
    private function __construct(int $status, float $creditValue)
    {
        $this->status = $status;
        $this->creditValue = $creditValue;
    }

}
