<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zones= Zone::all();

        $cities =[
            [
                'city_name' => 'PARIS',
                'postcode' => '75000',
                'region' => 'Île-de-France',
                'zone_id' => $zones->where('zone_name', 'ZONE NORD')->first()->zone_id,
            ],
            [
                'city_name' => 'LYON',
                'postcode' => '69000',
                'region' => 'Auvergne-Rhône-Alpes',
                'zone_id' => $zones->where('zone_name', 'ZONE SUD')->first()->zone_id,
            ],
            [
                'city_name' => 'MARSEILLE',
                'postcode' => '13000',
                'region' => 'Provence-Alpes-Côte d\'Azur',
                'zone_id' => $zones->where('zone_name', 'ZONE EST')->first()->zone_id,
            ],
        ];

        foreach($cities as $city){
            City::create($city);
        }
    }
}
