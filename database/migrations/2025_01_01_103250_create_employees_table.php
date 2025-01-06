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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade')->nullable();
      //      $table->unsignedBigInteger('_administrative_department_id')->nullable(); // أضف العمود
    //$table->foreign('_administrative_department_id')
      //    ->references('id')
        //  ->on('_adminstrative_departments');
          $table->foreignId('_administrative_department_id')->onDelete('cascade')->nullable();

            $table->string('employe_type')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
