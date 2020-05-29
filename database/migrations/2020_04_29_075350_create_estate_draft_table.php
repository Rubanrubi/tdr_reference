<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstateDraftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decedent_requests_draft', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('relationship')->nullable();
            $table->boolean('person_dealing_with_estate')->nullable();
            $table->string('person_dealing_name')->nullable();
            $table->string('person_dealing_phone_number')->nullable();
            $table->boolean('probate_applied')->nullable();
            $table->boolean('available_for_contact')->nullable();
            $table->boolean('email_available_for_contact')->nullable();
            $table->boolean('phone_number_available_for_contact')->nullable();
            $table->boolean('mail_available_for_contact')->nullable();
            $table->string('is_verify_identity')->nullable();
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
        Schema::dropIfExists('decedent_requests_draft');
    }
}
