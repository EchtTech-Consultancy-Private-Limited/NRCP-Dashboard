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
        Schema::create('general_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('state')->nullable();
            $table->string('hospital')->nullable();
            $table->string('designation')->nullable();
            $table->integer('contact_number')->length(11)->nullable();
            $table->string('mou')->nullable();
            $table->string('date_of_joining')->nullable();
            $table->string('soft_delete')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_profiles');
    }
};
