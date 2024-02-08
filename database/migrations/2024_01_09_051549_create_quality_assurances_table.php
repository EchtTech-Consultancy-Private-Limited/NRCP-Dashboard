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
        Schema::create('quality_assurances', function (Blueprint $table) {
            $table->id();
            $table->string('pt')->nullable();
            $table->string('accredited_pt')->nullable();
            $table->string('supervisors_trained')->nullable();
            $table->string('lims')->nullable();
            $table->string('soft_delete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quality_assurances');
    }
};
