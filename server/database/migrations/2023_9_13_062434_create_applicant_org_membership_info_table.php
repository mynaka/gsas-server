<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration  {
    public function up() {
        Schema::create('applicant_org_membership_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_basic_info_id');
            $table->string('institution');
            $table->string('position');
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('applicant_basic_info_id')->references('id')->on('applicant_basic_info');
        });
    }

    public function down() {
        Schema::dropIfExists('applicant_org_membership_info');
    }
};
