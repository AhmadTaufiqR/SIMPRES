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
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedules_id')->constrained();
            $table->enum('start_attendance', ['hadir', 'izin', 'alpa'])->default('alpa');
            $table->enum('end_attendance', ['hadir', 'izin', 'alpa'])->default('alpa');
            $table->string('start_documentation')->nullable();
            $table->string('end_documentation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presences');
    }
};
