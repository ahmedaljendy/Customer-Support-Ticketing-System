<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketEscalation>
 */
class TicketEscalationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'escalated_by' => User::factory(),
            'ticket_id' => Ticket::factory(),
            'escalated_to' => User::factory(),
            'reason' => fake()->sentence(10),
        ];
    }
}
