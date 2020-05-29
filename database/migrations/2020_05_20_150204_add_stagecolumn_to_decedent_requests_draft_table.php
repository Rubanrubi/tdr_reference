<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStagecolumnToDecedentRequestsDraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('decedent_requests_draft', function (Blueprint $table) {
            $table->tinyInteger('request_stage')->default(1);
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
            $table->dropColumn('request_stage');
        });
    }
}
