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
        Schema::create('nhm_dashboards', function (Blueprint $table) {
            $table->id();
            $table->string('year',45);
            $table->integer('state_id');
            $table->string('rops')->nullable();
            $table->string('rops_size')->nullable();
            $table->string('supplementary_rops')->nullable();
            $table->string('supplementary_rops_size')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhm_dashboards');
    }
};
