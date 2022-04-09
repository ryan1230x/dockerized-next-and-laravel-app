<?php

namespace App\Http\Controllers\Contracts;

use App\Http\Requests\StoreTicketRequest;
use Illuminate\Http\JsonResponse;

interface TicketControllerContract
{
    public function index(): JsonResponse;
    public function store(StoreTicketRequest $request): JsonResponse;
    public function show(string $ticket): JsonResponse;
}
