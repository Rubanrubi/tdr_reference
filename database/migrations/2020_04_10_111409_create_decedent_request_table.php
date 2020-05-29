<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecedentRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decedent_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->string('address');
            $table->string('email');
            $table->string('phone_number');
            $table->string('relationship');
            $table->boolean('person_dealing_with_estate');
            $table->string('person_dealing_name')->nullable();
            $table->string('person_dealing_phone_number')->nullable();
            $table->boolean('probate_applied');
            $table->boolean('available_for_contact');
            $table->boolean('email_available_for_contact')->nullable();
            $table->boolean('phone_number_available_for_contact')->nullable();
            $table->boolean('mail_available_for_contact')->nullable();
            $table->string('is_verify_identity');
            $table->string('name_of_departed')->nullable();
            $table->string('present_address')->nullable();
            $table->string('previous_address')->nullable();
            $table->string('second_previous_address')->nullable();
            $table->string('third_previous_address')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('date_of_death')->nullable();
            $table->string('cause_of_death')->nullable();
            $table->unsignedBigInteger('certificate_id')->nullable();
            $table->foreign('certificate_id')->references('id')->on('document_types');
            $table->string('certificate_number')->nullable();
            $table->bigInteger('status')->default(1);
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
        Schema::dropIfExists('decedent_requests');
    }
}
