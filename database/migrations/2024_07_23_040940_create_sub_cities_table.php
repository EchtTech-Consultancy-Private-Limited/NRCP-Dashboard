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
        Schema::create('sub_cities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_id');
            $table->foreignId('district_id');
            $table->string('code')->nullable();
            $table->string('name');
            $table->string('abbreviation')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_cities');
    }
};
