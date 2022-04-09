<?php

namespace Tests\Feature;

use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use DateTime;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Tests\TestCase;

class TicketTest extends TestCase
{

    use RefreshDatabase;
    use WithFaker;


    public function test_can_get_all_tickets()
    {
        $ticket = Ticket::factory()->create();

        $response = $this->getJson('api/tickets');

        $response->assertOk();

        $response->assertJsonFragment([
            'id' => $ticket->id
        ]);
    }

    public function test_create_a_ticket()
    {
        $response = $this->postJson('api/tickets', $this->data());

        $response->assertCreated();

        $response->assertJsonFragment([
            'success' => true
        ]);

        $this->assertCount(1, Ticket::all());
    }

    public function test_see_single_ticket()
    {
        $this->withoutExceptionHandling();

        $ticket = Ticket::factory()->create();

        $response = $this->getJson("api/tickets/{$ticket->ticket_id}");

        // $response->assertOk();

        $this->assertCount(1, Ticket::all());

        $response->assertJsonFragment([
            'success' => true,
        ]);
    }

    public function test_handle_exception_of_see_single_ticket()
    {
        $response = $this->getJson('api/tickets/1');

        $response->assertNotFound();

        $this->assertCount(0, Ticket::all());

        $response->assertJsonFragment([
            'success' => false,
        ]);
    }

    public function test_created_by_is_required()
    {
        $response = $this->postJson('api/tickets', [
            'created_by' => ''
        ]);

        $this->assertEmpty(Ticket::first());

        $response->assertJsonValidationErrorFor('created_by');
    }

    public function test_created_by_must_be_a_string()
    {
        $response = $this->postJson('api/tickets', [
            'created_by' => 434893743
        ]);

        $response->assertJsonValidationErrorFor('created_by');
    }

    private function data()
    {
        return [
            'reference' => $this->faker->numberBetween(0, 1000),
            'address' => $this->faker->address,
            'name' => $this->faker->name,
            'landline' => $this->faker->numberBetween(0, 999999999),
            'contact_number' => $this->faker->numberBetween(0, 999999999),
            'network' => 'internet',
            'service' => 'FTTH',
            'portability' => $this->faker->boolean(),
            'package' => 'basic',
            'created_by' => 'Ryan',
            'requested_date' => $this->faker->date,
            'created_by' => $this->faker->name,
        ];
    }
}
