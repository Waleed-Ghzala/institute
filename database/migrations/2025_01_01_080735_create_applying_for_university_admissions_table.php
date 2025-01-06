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
        Schema::create('applying_for_university_admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->integer('first_desir');
            $table->integer('Second_desir');
            $table->integer('third_desir');
            $table->integer('fourth_desir');
            $table->integer('fifth_desir');
            $table->integer('sixth_desir');
            $table->decimal('score', 3, 1);
            $table->string(' copy_of_certificate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applying_for_university_admissions');
    }
};
