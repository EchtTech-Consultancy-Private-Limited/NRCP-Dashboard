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
        Schema::create('p_form_patient_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_code');
            $table->foreignId('citizenship');
            $table->foreignId('pform_state');
            $table->foreignId('pform_city');
            $table->string('mobile_number',45)->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('birth_of_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('id_type')->nullable();
            $table->string('identification_number')->nullable();
            $table->string('taluka')->nullable();
            $table->string('village')->nullable();
            $table->string('house_no')->nullable();
            $table->string('street_name')->nullable();
            $table->string('landmark')->nullable();
            $table->string('pincode',45)->nullable();
            $table->string('provisinal_diagnosis')->nullable();
            $table->string('date_of_onset')->nullable();
            $table->string('opd_ipd')->nullable();
            $table->string('test_suspected')->nullable();
            $table->string('type_of_sample')->nullable();
            $table->string('test_resquested')->nullable();
            $table->string('sample_date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_form_patient_records');
    }
};
