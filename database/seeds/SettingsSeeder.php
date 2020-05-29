<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'key' => 'fax_number',
            'value' => "+18345672839",
            'status' => 1
        ]);
        DB::table('settings')->insert([
                'key' => '2fa_enable',
                'value' => "0",
                'status' => 1
            ]);
    }
}
