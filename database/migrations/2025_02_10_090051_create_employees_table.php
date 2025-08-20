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
            $table->string('FIRSTNAME',100)->nullable();
            $table->string('LASTNAME', 100)->nullable();
            $table->enum('GENDER', ['male', 'female'])->nullable();
            $table->string('ADDRESS', 100)->nullable();
            $table->date('DOB')->nullable();
            $table->unsignedBigInteger('DEPT_ID')->nullable();
            $table->foreign('DEPT_ID')->references('id')->on('departments');     
            $table->timestamps();
            $table->enum('STATUS', ['cont', 'emp', 'no_act'])->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
