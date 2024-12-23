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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->longText('profile_picture')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('username')->nullable();
            $table->string('police_id')->nullable();
            $table->foreignId('position_id')->constrained()->nullabe();
            $table->foreignId('unit_id')->constrained()->nulalble();
            $table->foreignId('rank_id')->constrained()->nulalble();
            $table->string('year_attended')->nullabe();
            $table->string('contact_number')->nullable();
            $table->string('age')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('date_of_birth')->nullable();
            $table->enum('civil_status', ['Married', 'Single', 'Widowed', 'Divorced', 'Separated', 'Engaged', 'Not selected'])->nullable();
            $table->enum('gender', ['Male', 'Female', 'Not selected'])->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
