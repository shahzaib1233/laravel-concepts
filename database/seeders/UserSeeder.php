<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0; $i < 100; $i++) {
            User::insert([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'age' => rand(19, 24),
                'city' => 'karachi',
            ]);
        }

    }
}
