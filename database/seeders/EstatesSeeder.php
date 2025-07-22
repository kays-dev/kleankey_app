<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Estate;
use App\Models\Owner;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owners= Owner::all();
        $zones= Zone::all();
        $agents= Agent::all();

        $estates=[
            [
                'owner_id' => $owners->first()->owner_id,
                'estate_address' => '15 Rue de Rivoli',
                'zone_id' => $zones->where('zone_name', 'ZONE NORD')->first()->zone_id,
                'estate_type' => 'appartement', // Supposant que c'est une valeur de votre enum
                'rooms_number' => 3,
                'surface' => 75.50,
            ],
            [
                'owner_id' => $owners->skip(1)->first()->owner_id,
                'estate_address' => '28 Avenue des Champs',
                'zone_id' => $zones->where('zone_name', 'ZONE SUD')->first()->zone_id,
                'estate_type' => 'maison',
                'rooms_number' => 5,
                'surface' => 120.00,
            ],
            [
                'owner_id' => $owners->last()->owner_id,
                'estate_address' => '42 Boulevard Saint-Germain',
                'zone_id' => $zones->where('zone_name', 'ZONE EST')->first()->zone_id,
                'estate_type' => 'appartement',
                'rooms_number' => 1,
                'surface' => 35.25,
            ],
        ];

        foreach($estates as $estateData){
            $estate= Estate::create($estateData);

            $randomAgents = $agents->random(rand(1, 2));
            $estate->agents()->attach($randomAgents->pluck('agent_id'));
        }
    }
}
