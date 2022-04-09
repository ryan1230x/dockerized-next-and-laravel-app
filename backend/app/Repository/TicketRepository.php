<?php

namespace App\Repository;

use App\Models\Ticket;
use App\Repository\Contracts\TicketRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TicketRepository extends BaseRepository implements TicketRepositoryContract
{

    /**
     *  __construct
     *
     * @param Ticket $model
     *
     * @return void
     */
    public function __construct(Ticket $model)
    {
        parent::__construct($model);
    }

    /**
     *  get all tickets
     *
     * @return Collection
     */
    public function getAllTickets(): Collection
    {
        return $this->model->newQuery()->get();
    }

    /**
     * get an individual ticket
     *
     * @param Ticket $ticket
     *
     * @return Collection
     */
    public function getTicket(string $ticket)
    {
        $ticket = $this->model->newQuery()->find($ticket);

        if ($ticket === null) {
            throw new ModelNotFoundException("Ticket Not Found");
        }

        return $ticket;
    }

    /**
     * create a ticket
     *
     * @param array $data
     *
     * @return void
     */
    public function createTicket(array $data): Ticket
    {
        $ticketData = array_merge(
            $data,
            ['ticket_id' => sha1($data['reference'] . date("U"))]
        );
        $ticket = $this->model->newQuery()->create($ticketData);
        return $ticket;
    }
}
