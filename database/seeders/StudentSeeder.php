<?php

namespace Database\Seeders;

use App\Models\seeders\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //for single record
        // Students::create([
        //     'name'=>'Shahzaib Imtiaz',
        //     'father_name'=>'Imtiaz',
        //     'age'=>19,
        //     'is_active'=>1
        // ]);

        //for multiple record
        // $students=[
        //     [
        //         'name'=>'Shayan Imtiaz',
        //         'father_name'=>'Imtiaz',
        //         'age'=>19,
        //         'is_active'=>1
        //     ],
        //     [
        //         'name'=>'ali',
        //         'father_name'=>'test',
        //         'age'=>19,
        //         'is_active'=>1
        //     ],
        //       [
        //         'name'=>'shahzaib Imtiaz',
        //         'father_name'=>'Imtiaz',
        //         'age'=>19,
        //         'is_active'=>1
        //     ],
           
        // ];

        // Students::insert($students);


        //store fake data
        for($i=0; $i < 300 ; $i++)
        {
        Students::create([
            'name'=>fake()->name(),
            'father_name'=>fake()->name(),
            'age'=>19,
            'is_active'=>1
        ]
        );
        }
    }
}
