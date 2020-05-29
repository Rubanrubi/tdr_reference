<?php

use Illuminate\Database\Seeder;

class CauseofDeathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('causeof_deaths')->insert([
            'cause_of_death' => 'Brain Fever',
            'status' => 1,
        ]);
        DB::table('causeof_deaths')->insert([
                'cause_of_death' => 'Heart Attack',
                'status' => 1,
            ]);
    }
}
