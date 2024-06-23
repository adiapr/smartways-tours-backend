<?php

namespace Database\Seeders;

use App\Models\TourPrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UuidPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tours = TourPrice::get();

        foreach($tours as $item){
            $item->uuid = Str::uuid();
            $item->save();
        }
    }
}
