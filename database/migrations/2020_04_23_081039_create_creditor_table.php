<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('creditor_id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('original_password')->nullable();
            $table->text('address');
            $table->string('division_or_brand')->nullable();
            $table->string('suite')->nullable();
            $table->string('location');
            $table->string('main_contact_name');
            $table->string('main_contact_title');
            $table->string('main_contact_phone');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_email_verified')->default(0);
            $table->string('verification_code')->nullable();
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
        Schema::dropIfExists('creditors');
    }
}
