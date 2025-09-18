<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketFeedback;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketFeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tickets = Ticket::all();
        $users = User::all();
            
        $tickets->each(function ($ticket) use ($users) {
            $selectedUsers = $users->random(rand(3, 5));
        
            foreach ($selectedUsers as $user) {
                TicketFeedback::factory()->create([
                    'ticket_id' => $ticket->id,
                    'user_id'   => $user->id,
                ]);
            }
        });
    }
}
