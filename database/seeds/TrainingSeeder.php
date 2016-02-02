<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('trainings')->insert([
            ['name' => 'Developer Startup', 'slug' => str_slug('Developer Startup'), 'maxAttendees' => 20],
            ['name' => 'Developer Advanced', 'slug' => str_slug('Developer Advanced'), 'maxAttendees' => 12],
            ['name' => 'Template Startup', 'slug' => str_slug('Template Startup'), 'maxAttendees' => 20],
            ['name' => 'Template Advanced', 'slug' => str_slug('Template Advanced'), 'maxAttendees' => 20]
        ]);

        for($i = 0; $i < 10; $i++) {
            for ($x = 0; $x < rand(3,20); $x++) {
                DB::table('attendees')->insert([
                    'firstname' => str_random(5),
                    'lastname' => str_random(9),
                    'company' => ((rand(1,10) % 2) ? str_random(10) : ''),
                    'training_id' => rand(1,4)
                ]);
            }
        }


    }
}
