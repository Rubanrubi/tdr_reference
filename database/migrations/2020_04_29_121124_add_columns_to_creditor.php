<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCreditor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('creditors', function (Blueprint $table) {
            $table->tinyInteger('confirmed_accounts')->nullable();
            $table->string('is_other')->nullable();
            $table->tinyInteger('data_transfer')->nullable();
            $table->tinyInteger('data_sharing')->nullable();
            $table->tinyInteger('white_label_webportal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('creditors', function (Blueprint $table) {
            $table->dropColumn('confirmed_accounts');
            $table->dropColumn('is_other');
            $table->dropColumn('data_transfer');
            $table->dropColumn('data_sharing');
            $table->dropColumn('white_label_webportal');
        });
    }
}
