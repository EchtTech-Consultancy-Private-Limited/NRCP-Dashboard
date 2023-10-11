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
        Schema::create('patient_records',function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30)->nullable();
            $table->string('middle_name',30)->nullable();
            $table->string('last_name',30)->nullable();
            $table->date('birth_date')->nullable();
            $table->integer('gender')->length(10)->unsigned()->nullable();
            $table->integer('id_type')->length(10)->unsigned()->nullable();
              $table->integer('permanent_address')->default(0)->nullable();
            $table->integer('identification_number')->length(12)->unsigned()->nullable();
            $table->integer('citizenship')->length(10)->unsigned()->nullable();
            $table->integer('state')->length(10)->unsigned()->nullable();
            $table->integer('district')->length(10)->unsigned()->nullable();
            $table->integer('taluka')->length(10)->unsigned()->nullable();
            $table->integer('village')->length(10)->unsigned()->nullable();
            $table->string('house_no',20)->nullable();
            $table->integer('Pincode')->length(20)->unsigned()->nullable();
            $table->integer('contact_number')->length(12)->unsigned()->nullable();
            $table->string('street_name',40)->nullable();
            $table->string('landmark',40)->nullable();
            $table->integer('provisinal_diagnosis')->length(10)->unsigned()->nullable();
            $table->date('date_of_onset')->nullable();
            $table->integer('opd_ipd')->length(10)->unsigned()->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
