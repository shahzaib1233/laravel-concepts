<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

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
        // for ($i = 0; $i < 20000; $i++) {
        //     User::insert([
        //         'name' => fake()->name(),
        //         'email' => fake()->unique()->safeEmail(),
        //         'age' => rand(19, 24),
        //         'city' => 'karachi',
        //     ]);
        // }


          DB::transaction(function () {
        $now = now();
        $batch = [];
        $chunkSize = 1000; // 500–5000 is usually good

        for ($i = 1; $i <= 100; $i++) {
            $batch[] = [
                'name'       => fake()->name(),
                // Avoid Faker::unique() overhead; make emails unique yourself
                'email'      => "seed{$i}@example.test",
                'age'        => random_int(19, 24),
                'city'       => 'karachi',
                'created_at' => $now,
                'updated_at' => $now,
            ];

            if ($i % $chunkSize === 0) {
                DB::table('users')->insert($batch); // single multi-row INSERT
                $batch = [];
            }
        }

        if (!empty($batch)) {
            DB::table('users')->insert($batch);
        }
    });

    }
}
