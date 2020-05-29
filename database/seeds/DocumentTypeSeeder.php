<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_types')->insert([
            'weight' => 2,
            'document_type' => "Death Certificate",
        ]);
        DB::table('document_types')->insert([
            'weight' => 1,
            'document_type' => "FBI case sheet",
        ]);
    }
}
