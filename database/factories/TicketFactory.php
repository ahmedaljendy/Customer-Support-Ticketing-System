<?php

namespace Database\Factories;

use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
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
            'user_id' => User::factory(),
            'subject' => fake()->sentence(6),
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['open','in_progress','resolved','closed']),
            'priority' => fake()-> randomElement(['low', 'medium', 'high', 'urgent']),
            'assigned_to' => User::factory(),
            'category_id' => TicketCategory::factory()
        ];
    }
}
