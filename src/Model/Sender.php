<?php

namespace SMSO\Model;

use stdClass;

/**
 * Class Sender
 * @package SMSO\Model
 */
class Sender
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $pricePerMessage;

    /**
     * @param stdClass $data
     * @return static
     */
    public static function create(stdClass $data): self
    {
        return new static($data->id, $data->name, $data->pricePerMessage);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPricePerMessage(): float
    {
        return $this->pricePerMessage;
    }

    /**
     * Sender constructor.
     *
     * @param int $id
     * @param string $name
     * @param float $pricePerMessage
     */
    private function __construct(int $id, string $name, float $pricePerMessage)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pricePerMessage = $pricePerMessage;
    }

}
