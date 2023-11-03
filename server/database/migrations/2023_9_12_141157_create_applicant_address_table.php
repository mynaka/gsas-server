<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('applicant_address', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_basic_info_id');
            $table->string('address_type');
            $table->string('street_address');
            $table->string('town_city');
            $table->string('province_state');
            $table->string('country');
            $table->string('zip');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('applicant_basic_info_id')
                ->references('id')
                ->on('applicant_basic_info')
                ->onDelete('cascade'); // Define the desired delete behavior

        });
    }

    public function down() {
        Schema::dropIfExists('applicant_address');
    }
};