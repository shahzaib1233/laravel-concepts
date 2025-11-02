<?php

namespace Database\Seeders;

use App\Models\EducationModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            EducationModel::create([
                'degree_name' => $faker->randomElement([
                    'Bachelor of Science',
                    'Bachelor of Arts',
                    'Master of Science',
                    'Master of Business Administration',
                    'Doctor of Philosophy',
                    'Associate Degree',
                    'Diploma in Engineering'
                ]),
                'student_id' => rand(1, 300),
            ]);
        }
        
    }
}
