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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teachers_id')->constrained();
            $table->foreignId('courses_id')->constrained();
            $table->foreignId('rooms_id')->constrained();
            $table->string('entry_time');
            $table->string('clock_out');
            $table->string('day');
            $table->string('hour_to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
