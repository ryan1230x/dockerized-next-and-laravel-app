<?php

namespace App\Repository\Contracts;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;

interface TicketRepositoryContract extends BaseRepositoryContract
{
    public function getAllTickets(): Collection;
    public function getTicket(string $ticket);
    public function createTicket(array $data): Ticket;
}
