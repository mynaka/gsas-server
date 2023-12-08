<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('create_user_login', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('email'); // VARCHAR column for email
            $table->string('password'); // VARCHAR column for password
            $table->timestamp('created_at')->useCurrent(); // Timestamp for creation, default to current timestamp
            $table->boolean('is_active')->default(true); // Boolean column for user activity, default to true (active)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_user_login');
    }
};
