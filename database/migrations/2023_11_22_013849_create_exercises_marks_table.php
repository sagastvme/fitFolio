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
        Schema::create('exercises_marks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('exercise_id')->constrained()->cascadeOnDelete();
            $table->integer('mark');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises_marks');
    }
};
