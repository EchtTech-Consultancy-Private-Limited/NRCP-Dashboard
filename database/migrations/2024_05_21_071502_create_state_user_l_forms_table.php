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
        Schema::create('state_user_l_forms', function (Blueprint $table) {
            $table->id();
            $table->date('current_date')->nullable();
            $table->string('name_nodal_person')->nullable();
            $table->string('designation_nodal_person')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('institute_name')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_user_l_forms');
    }
};
