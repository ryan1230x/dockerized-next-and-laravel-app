<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

class TicketFactory extends Factory
{

    protected $model = Ticket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference' => $this->faker->numberBetween(0, 1000),
            'address' => $this->faker->address(),
            'name' => $this->faker->name(),
            'landline' => $this->faker->numberBetween(0, 999999999),
            'contact_number' => $this->faker->numberBetween(0, 999999999),
            'network' => 'internet',
            'service' => 'FTTH',
            'portability' => $this->faker->boolean(),
            'package' => 'basic',
            'created_by' => 'Ryan',
            'requested_date' => $this->faker->date(),
            'created_by' => $this->faker->name(),
            'ticket_id' => $this->faker->uuid(),
        ];
    }
}
