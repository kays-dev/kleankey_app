<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owners=[
            [
                'owner_name' => 'ROBERT',
                'owner_surname' => 'Claude',
                'owner_address' => '12 RUE DU COMMERCE',
                'owner_mail' => 'claude.robert@gmail.com',
                'owner_tel' => '0612345678',
            ],
            [
                'owner_name' => 'MOREAU',
                'owner_surname' => 'Sophie',
                'owner_address' => '34 AVENUE DE LA LIBERTÉ',
                'owner_mail' => 'sophie.moreau@outlook.com',
                'owner_tel' => '0623456789',
            ],
            [
                'owner_name' => 'LEROY',
                'owner_surname' => 'Antoine',
                'owner_address' => '56 PLACE DE LA RÉPUBLIQUE',
                'owner_mail' => 'antoine.leroy@yahoo.fr',
                'owner_tel' => '0634567890',
            ],
        ];

        foreach($owners as $owner){
            Owner::create($owner);
        }
    }
}
