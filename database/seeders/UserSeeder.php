<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = array([
            'nom' => 'Namountougou',
            'prenom' => 'Dimanche',
            'email' => "dimanchenamo@gmail.com",
            'email_verified_at' => now(),
            'password' => bcrypt('Tassi$2003'), // Tassi$2003
            'remember_token' => "11111111111111111111111111111111",
        ]);

        User::insert($user);
    }
}
