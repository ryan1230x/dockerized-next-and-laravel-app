<?php

namespace App\Services;

use App\Models\Ticket;
use App\Repository\Contracts\TicketRepositoryContract;
use App\Services\Contracts\TicketServiceContract;
use Illuminate\Database\Eloquent\Collection;

class TicketService implements TicketServiceContract
{

    private $ticketRepository;

    /**
     * __construct
     *
     * @param TicketRepositoryContract $ticketRepository
     *
     * @return void
     */
    public function __construct(TicketRepositoryContract $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
    }

    /**
     * get all tickets
     *
     * @return Collection
     */
    public function getAllTickets(): Collection
    {
        return $this->ticketRepository->getAllTickets();
    }

    /**
     * get an indivudual ticket
     *
     * @param Ticket $ticket
     *
     * @return Collection
     */
    public function getTicket(string $ticket)
    {
        return $this->ticketRepository->getTicket($ticket);
    }

    /**
     * Method makeTicket
     *
     * @param array $data [explicite description]
     *
     * @return Ticket
     */
    public function makeTicket(array $data): Ticket
    {
        return $this->ticketRepository->createTicket($data);
    }
}
