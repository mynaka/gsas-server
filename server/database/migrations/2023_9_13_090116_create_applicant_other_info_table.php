<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  {
    public function up() {
        Schema::create('applicant_other_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_basic_info_id');
            $table->boolean('has_applied');
            $table->string('result')->nullable();
            $table->date('date_of_result')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('applicant_basic_info_id')->references('id')->on('applicant_basic_info');
        });
    }

    public function down() {
        Schema::dropIfExists('applicant_other_info');
    }
};
