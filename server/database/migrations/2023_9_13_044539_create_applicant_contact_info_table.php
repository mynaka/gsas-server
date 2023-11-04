<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('applicant_contact_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('applicant_basic_info_id');
            $table->string('contact_type');
            $table->text('contact_details');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('applicant_basic_info_id')
                ->references('id')
                ->on('applicant_basic_info');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicant_contact_info');
    }
};
