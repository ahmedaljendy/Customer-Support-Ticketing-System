<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketEscalation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketEscalationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        $tickets = Ticket::all();
        
        foreach ($tickets as $ticket) {
            $escalatedBy = User::where('role', 'agent')->inRandomOrder()->first();

            $escalatedTo = User::where('id', '!=', $escalatedBy?->id)
                ->whereIn('role', ['agent', 'admin'])
                ->inRandomOrder()
                ->first();
            
            if (!$escalatedBy || !$escalatedTo) {
                continue;
            }
            TicketEscalation::factory()->create([
            'escalated_by' => $escalatedBy->id,
            'ticket_id' => $ticket->id,
            'escalated_to' => $escalatedTo->id,
            'reason'=> fake()->sentence(8),
           ]) ;
        }
        
    }
}
