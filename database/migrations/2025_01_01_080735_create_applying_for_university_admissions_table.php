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
            $table->foreignId('user_id')->onDelete('cascade')->nullable();
            $table->string('first_desir_code');
            $table->string('Second_desir_code')->nullable();
            $table->string('third_desir_code')->nullable();
            $table->string('fourth_desir_code')->nullable();
            $table->string('fifth_desir_code')->nullable();
            $table->string('sixth_desir_code')->nullable();
            $table->decimal('score', 4, 1);
            $table->string('copy_of_certificate');
            $table->string('status')->default('new');

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
