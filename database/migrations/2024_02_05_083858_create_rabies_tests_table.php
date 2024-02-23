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
        Schema::create('rabies_tests', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('number_of_patients')->nullable();
            $table->string('numbers_of_sample_recieved')->nullable();
            $table->string('type')->nullable();
            $table->string('method_of_diagnosis')->nullable();
            $table->string('numbers_of_test')->nullable();
            $table->string('numbers_of_positives')->nullable();
            $table->string('numbers_of_intered_ihip')->nullable();
            $table->string('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rabies_tests');
    }
};
