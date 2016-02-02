<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Training extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            'name' => str_random(10)
        ]);

//        for($i = 0; $i < 10; $i++) {
//            for ($x = 0; $x < rand(3,20), $x++) {
//                DB::table('attendees')->insert([
//                    'firstname' => str_random(5),
//                    'lastname' => str_random(9),
//                ]);
//            }
//        }


    }
}
