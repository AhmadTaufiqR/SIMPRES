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
        Schema::create('detail_presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('presences_id')->constrained();
            $table->foreignId('teachers_id')->constrained();
            $table->string('documentation');
            $table->string('letter');
            $table->string('attendance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_presences');
    }
};
