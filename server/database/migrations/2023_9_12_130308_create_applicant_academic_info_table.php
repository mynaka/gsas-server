<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantAcademicInfoTable extends Migration
{
    public function up() {
        Schema::create('applicant_academic_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_basic_info_id'); // Foreign key reference
            $table->string('institution_name');
            $table->string('degree_level');
            $table->string('degree_received');
            $table->integer('year_received');
            $table->string('specialization_major');
            $table->timestamps();

            // Define the foreign key constraint
            $table->foreign('applicant_basic_info_id')
                ->references('id')
                ->on('applicant_basic_info')
                ->onDelete('cascade'); // Define the desired delete behavior
        });
    }

    public function down() {
        Schema::dropIfExists('applicant_academic_info');
    }
}