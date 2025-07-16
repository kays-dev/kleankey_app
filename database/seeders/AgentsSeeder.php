<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zones= Zone::all();

        $agents=[
[
                'agent_name' => 'MARTIN',
                'agent_surname' => 'Jean',
                'agent_address' => '123 RUE DE LA PAIX',
                'agent_mail' => 'jean.martin@agency.com',
                'agent_tel' => '0123456789',
                'zone_id' => $zones->where('zone_name', 'ZONE NORD')->first()->zone_id,
            ],
            [
                'agent_name' => 'DUPONT',
                'agent_surname' => 'Marie',
                'agent_address' => '456 AVENUE DES FLEURS',
                'agent_mail' => 'marie.dupont@agency.com',
                'agent_tel' => '0234567890',
                'zone_id' => $zones->where('zone_name', 'ZONE SUD')->first()->zone_id,
            ],
            [
                'agent_name' => 'BERNARD',
                'agent_surname' => 'Pierre',
                'agent_address' => '789 BOULEVARD VICTOR HUGO',
                'agent_mail' => 'pierre.bernard@agency.com',
                'agent_tel' => '0345678901',
                'zone_id' => $zones->where('zone_name', 'ZONE EST')->first()->zone_id,
            ],
        ];

        foreach($agents as $agent){
            Agent::create($agent);
        }
    }
}
