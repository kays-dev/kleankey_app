<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Estate;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents= Agent::all();
        $estates= Estate::all();

        $services=[
 [
                'service_name' => 'Nettoyage général',
                'service_type' => 'ménage',
                'description' => 'Nettoyage complet du bien immobilier avant visite',
                'duration' => '02:30',
                'agent_id' => $agents->first()->agent_id,
            ],
            [
                'service_name' => 'Gardiennage résidentiel',
                'service_type' => 'conciergerie',
                'description' => 'Service de gardiennage et surveillance du bien',
                'duration' => '08:00',
                'agent_id' => $agents->skip(1)->first()->agent_id,
            ],
            [
                'service_name' => 'Entretien ménager',
                'service_type' => 'ménage',
                'description' => 'Entretien régulier des parties communes',
                'duration' => '01:30',
                'agent_id' => $agents->last()->agent_id,
            ],
        ];

        foreach($services as $serviceData){
            $service = Service::create($serviceData);

            $randomEstates = $estates->random(rand(1, 2));
            $service->estates()->attach($randomEstates->pluck('estate_id'));
        }
    }
}
