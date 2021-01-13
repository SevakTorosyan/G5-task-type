<?php

namespace src\Model;

/**
 * Class DigitsModel
 * @package src\Model
 */
class DigitsModel implements ModelInterface
{
    /** @var int */
    private $first;

    /** @var int */
    private $end;

    /**
     * DigitsModel constructor.
     * @param int $first
     * @param int $end
     */
    public function __construct(int $first, int $end)
    {
        $this->first = $first;
        $this->end = $end;
    }

    /**
     * @return int
     */
    public function getFirst(): int
    {
        return $this->first;
    }

    /**
     * @return int
     */
    public function getEnd(): int
    {
        return $this->end;
    }
}
