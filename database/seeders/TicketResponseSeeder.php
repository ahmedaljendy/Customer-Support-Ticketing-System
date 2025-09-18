<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketResponse;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        
        $tickets = Ticket::all();
        
        $tickets->each(function  ($ticket) use ($users){
            TicketResponse::factory(rand(1,5))->create([
                'user_id' => $users->random()->id,
                'ticket_id' => $ticket->id
            ]);
        });
    }
}
