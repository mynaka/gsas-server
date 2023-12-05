<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() {
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('token');
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('user_id')->references('id')->on('create_user_login');
        });
    }

    public function down() {
        Schema::dropIfExists('user_tokens');
    }
};
