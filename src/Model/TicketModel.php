<?php


namespace src\Model;

/**
 * Class TicketModel
 * @package src\Model
 */
class TicketModel implements ModelInterface
{
    public const TICKET_NUMBER_LENGTH = 6;

    /** @var int */
    private $ticketNumber;

    /**
     * TicketModel constructor.
     * @param int $ticketNumber
     */
    public function __construct(int $ticketNumber)
    {
        $this->ticketNumber = $ticketNumber;
    }

    /**
     * @return int
     */
    public function getTicketNumber(): int
    {
        return $this->ticketNumber;
    }

    /**
     * @return string
     */
    public function parseTicketNumberToString(): string
    {
        return str_pad(
            (string)$this->ticketNumber,
            self::TICKET_NUMBER_LENGTH,
            '0',
            STR_PAD_LEFT
        );
    }
}
