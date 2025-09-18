<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        $categories = TicketCategory::all();
        
        
        
        Ticket::factory(20)->create([
            'user_id' => $users->random()->id,
            'assigned_to' => $users->random()->id,
            'category_id' => $categories->random()->id
            
        ]);
        
    }
}
