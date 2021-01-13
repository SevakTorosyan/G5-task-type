<?php

namespace src\Service;

use src\Model\TicketModel;

/**
 * Class TicketService
 * @package src\Service
 */
class TicketService
{
    /** @var TicketModel */
    private $ticket;

    /**
     * TicketService constructor.
     * @param TicketModel $ticket
     */
    public function __construct(TicketModel $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @return bool
     */
    public function isLuckyTicket(): bool
    {
        $ticketNumbers = str_split($this->ticket->parseTicketNumberToString(), TicketModel::TICKET_NUMBER_LENGTH/2);
        $firstPart = reset($ticketNumbers);
        $lastPart = end($ticketNumbers);

        if ($this->calculateTicketPartSum($firstPart) === $this->calculateTicketPartSum($lastPart)) {
            return true;
        }

        return false;
    }

    /**
     * @param string $ticketPart
     * @return int
     */
    private function calculateTicketPartSum(string $ticketPart): int
    {
        $ticketPartDigits = str_split($ticketPart);
        $ticketPartSum = 0;
        foreach ($ticketPartDigits as $ticketPartDigit) {
            $ticketPartSum += (int)$ticketPartDigit;
        }

        if ($ticketPartSum > 9) {
            return $this->calculateTicketPartSum((string)$ticketPartSum);
        }

        return $ticketPartSum;
    }
}
