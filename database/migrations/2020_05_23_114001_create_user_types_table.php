<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_type');
            $table->tinyInteger('is_primary');
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('data_privilage');
            $table->tinyInteger('report_privilage');
            $table->tinyInteger('search_privilage');
            $table->tinyInteger('billing_privilage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_types');
    }
}
