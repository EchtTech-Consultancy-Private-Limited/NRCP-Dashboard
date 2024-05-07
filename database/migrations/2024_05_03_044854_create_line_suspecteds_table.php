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
            $table->string('name', 255)->nullable();
            $table->string('age', 255)->nullable();
            $table->string('sex', 255)->nullable();
            $table->string('contact_number', 255)->nullable();
            $table->string('village', 255)->nullable();
            $table->string('sub_district_mandal', 255)->nullable();
            $table->string('district', 255)->nullable();
            $table->string('biting_animal', 255)->nullable();
            $table->string('suspected_probable', 255)->nullable();
            $table->string('bit_incidence_village', 255)->nullable();
            $table->string('bit_incidence_sub_district', 255)->nullable();
            $table->string('bit_incidence_district', 255)->nullable();
            $table->string('category_of_bite', 255)->nullable();
            $table->string('status_of_pep', 255)->nullable();
            $table->string('health_facility_name_institute', 255)->nullable();
            $table->string('health_facility_district', 255)->nullable();
            $table->string('outcome_of_patient', 255)->nullable();
            $table->string('bite_from_stray', 255)->nullable();
            $table->string('mobile_number', 255)->nullable();
            $table->date('date', 255)->nullable();
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
