<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class UserPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Storage::makeDirectory('public/users');
        
        $urls = [
            "https://i.pravatar.cc/300?img=1",
            "https://i.pravatar.cc/300?img=2",
            "https://i.pravatar.cc/300?img=3",
            "https://i.pravatar.cc/300?img=4",
            "https://i.pravatar.cc/300?img=5",
            "https://i.pravatar.cc/300?img=6",
            "https://i.pravatar.cc/300?img=7",
            "https://i.pravatar.cc/300?img=8",
            "https://i.pravatar.cc/300?img=9",
            "https://i.pravatar.cc/300?img=11",
        ];
        
        foreach ($urls as $index => $url) {
            $fileName = "user{$index}.jpg";

            $response = Http::get($url);

            if ($response->successful()) {
                $fileName = uniqid() . '.jpg';
                Storage::disk('public')->put('users/' . $fileName, $response->body());
                logger("Saved: storage/app/public/users/{$fileName}");
            }
        }
    }
}
