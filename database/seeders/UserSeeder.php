<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([

                'name' => 'Samuel Boadu',
                'phone' => '0249172797',
                'role_id' => 1,
                'password' =>  'admin'
                ]
        );  User::query()->create([

                'name' => 'Norman Nacion',
                'phone' => '0557180587',
                'role_id' => 1,
                'password' => 'admin'
                ]
        );
        User::query()->create([

                'name' => 'George Appiah',
                'phone' => '0243105088',
                'role_id' => 1,
                'password' => 'admin'
                ]
        );
        User::query()->create([

                'name' => 'Felix Toala',
                'phone' => '0260902460',
                'role_id' => 1,

                ]
        );
        User::query()->create([

                'name' => 'Emmanuel Worwornyo',
                'phone' => '0248204237',
                'role_id' => 2,

                ]
        );   User::query()->create([

                'name' => 'Elikplem Domney',
                'phone' => '0246954633',
                'role_id' => 2,

                ]
        );

        User::query()->create([

                'name' => 'Nelson Kofitse',
                'phone' => '0241453039',
                'role_id' => 2,

                ]
        );
        User::query()->create([

                'name' => 'Benjamin Atteh',
                'phone' => '0542457459',
                'role_id' => 2,

                ]
        ); User::query()->create([

                'name' => 'Anthony Dogbe',
                'phone' => '0240217277',
                'role_id' => 2,

                ]
        );User::query()->create([

                'name' => 'Sampson Sarfo',
                'phone' => '0245923173',
                'role_id' => 2,

                ]
        );
    }
}
