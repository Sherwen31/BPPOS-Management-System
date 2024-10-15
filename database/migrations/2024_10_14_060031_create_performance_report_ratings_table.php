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
        Schema::create('performance_report_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('performance_report_item_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->nullable();
            $table->integer('monday')->default(0)->nullable();
            $table->integer('tuesday')->default(0)->nullable();
            $table->integer('wednesday')->default(0)->nullable();
            $table->integer('thursday')->default(0)->nullable();
            $table->integer('friday')->default(0)->nullable();
            $table->integer('saturday')->default(0)->nullable();
            $table->integer('sunday')->default(0)->nullable();
            $table->integer('total')->default(0)->nullable();
            $table->string('cost')->nullable();
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performance_report_ratings');
    }
};
