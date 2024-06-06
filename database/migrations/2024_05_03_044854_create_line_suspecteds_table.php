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
        Schema::create('line_suspecteds', function (Blueprint $table) {
            $table->id();
            $table->date('suspected_date', 255)->nullable();
            $table->string('name_of_health', 255)->nullable();
            $table->string('address_hospital', 255)->nullable();
            $table->string('designation_name', 255)->nullable();
            $table->string('type_of_health', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('aadhar_number')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_suspecteds');
    }
};
