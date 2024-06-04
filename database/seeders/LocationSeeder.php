<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                "type" => "Domestik",
                "location" => "Jawa Timur"
            ],
            [
                "type" => "Domestik",
                "location" => "Bali"
            ],
            [
                "type" => "Domestik",
                "location" => "Lombok"
            ],
            // [
            //     "type" => "Domestik",
            //     "location" => "Belitung"
            // ],
            [
                "type" => "Internasional",
                "location" => "Jepang"
            ],
        ];

        foreach($data as $item){
            Location::firstOrCreate([
                "type" => $item['type'],
                "location" => $item['location'],
            ]);
        }
    }
}
