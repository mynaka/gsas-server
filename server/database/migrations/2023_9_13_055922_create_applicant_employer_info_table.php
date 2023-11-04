<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  {
    public function up() {
        Schema::create('applicant_employer_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_basic_info_id');
            $table->string('position');
            $table->string('institution');
            $table->string('street_address');
            $table->string('town_city');
            $table->string('province_state');
            $table->string('country');
            $table->string('zip');
            $table->string('employer_contact_number');
            $table->string('employer_email');
            $table->date('date_start');
            $table->date('date_end');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('applicant_basic_info_id')->references('id')->on('applicant_basic_info');
        });
    }

    public function down() {
        Schema::dropIfExists('applicant_employer_info');
    }
};
