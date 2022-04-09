<?php

namespace App\Services\Contracts;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Ticket;

interface TicketServiceContract
{
    public function getAllTickets(): Collection;
    public function getTicket(string $ticket);
    public function makeTicket(array $data);
}
