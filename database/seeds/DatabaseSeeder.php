<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(DocumentTypeSeeder::class);
        $this->call(CauseofDeathSeeder::class);
        $this->call(AdminTemplateSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
