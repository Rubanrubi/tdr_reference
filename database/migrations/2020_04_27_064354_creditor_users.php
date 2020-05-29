<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreditorUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditors_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creditor_id');
            $table->string('user_name');
            $table->string('user_phone');
            $table->string('user_title');
            $table->string('user_email');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('creditors_user');
    }
}
