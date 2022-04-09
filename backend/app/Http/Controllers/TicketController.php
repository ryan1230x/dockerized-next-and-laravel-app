<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Contracts\TicketControllerContract;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Resources\SlimTicketResource;
use App\Services\Contracts\TicketServiceContract;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TicketController extends Controller implements TicketControllerContract
{
    private $ticketService;

    /**
     * __construct
     *
     * @param TicketServiceContract $ticketService
     *
     * @return void
     */
    public function __construct(TicketServiceContract $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    /**
     * get all tickets
     *
     * @return SlimTicketResource
     */
    public function index(): JsonResponse
    {
        $tickets = $this->ticketService->getAllTickets();
        return new JsonResponse([
            'success' => true,
            'data' => SlimTicketResource::collection($tickets)
        ]);
    }

    /**
     * create a new ticket
     *
     * @param StoreTicketRequest $request
     *
     * @return void
     */
    public function store(StoreTicketRequest $request): JsonResponse
    {
        $ticket = $this->ticketService->makeTicket($request->validated());
        return response()
            ->json([
                'success'=> true,
                'data'=> $ticket,
            ], 201);
    }

    /**
     * see an individual ticket
     *
     * @param Ticket $ticket
     *
     * @return void
     */
    public function show(string $id): JsonResponse
    {
        try {
            $ticket = $this->ticketService->getTicket($id);
            return new JsonResponse([
                'success' => true,
                'data' => $ticket,
            ]);
        } catch (ModelNotFoundException $e) {
            return new JsonResponse([
                'success' => false,
                'data' => $e->getMessage(),
            ], 404);
        }
    }
}
