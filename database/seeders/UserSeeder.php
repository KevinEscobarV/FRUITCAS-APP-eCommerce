<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kevin David Escobar',
            'email' => 'escobarkevin567@gmail.com',
            'password' => bcrypt('kevin123')

        ])->assignRole('Administrador');
    }
}
