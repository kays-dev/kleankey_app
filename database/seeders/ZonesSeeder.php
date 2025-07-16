<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Zone;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zones = [
            ['zone_name' => 'ZONE NORD'],
            ['zone_name' => 'ZONE SUD'],
            ['zone_name' => 'ZONE EST'],
        ];

        foreach($zones as $zone){
            Zone::create($zone);
        }
    }
}
