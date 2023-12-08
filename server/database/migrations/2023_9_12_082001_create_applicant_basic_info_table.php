<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('applicant_basic_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigIntegerid('user_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('sex');
            $table->date('date_of_birth');
            $table->string('citizenship');
            $table->string('civil_status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('create_user_login');
        });
    }

    public function down() {
        Schema::dropIfExists('applicant_basic_info');
    }
};