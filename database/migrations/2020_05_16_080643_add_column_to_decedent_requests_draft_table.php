<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToDecedentRequestsDraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('decedent_requests_draft', function (Blueprint $table) {
            $table->string('country_code')->nullable();
            $table->string('person_dealing_country_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('decedent_requests_draft', function (Blueprint $table) {
            $table->dropColumn('country_code');
            $table->dropColumn('person_dealing_country_code');
        });
    }
}
