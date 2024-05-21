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
        Schema::create('line_suspected_calculates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('line_suspected_form_id');
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('village')->nullable();
            $table->string('sub_district_mandal')->nullable();
            $table->string('district')->nullable();
            $table->string('biting_animal')->nullable();
            $table->string('suspected_probable')->nullable();
            $table->string('bit_incidence_village')->nullable();
            $table->string('bit_incidence_sub_district')->nullable();
            $table->string('bit_incidence_district')->nullable();
            $table->string('category_of_bite')->nullable();
            $table->string('status_of_pep')->nullable();
            $table->string('health_facility_name_institute')->nullable();
            $table->string('health_facility_district')->nullable();
            $table->string('outcome_of_patient')->nullable();
            $table->string('bite_from_stray')->nullable();
            $table->string('mobile_number')->nullable();
            $table->date('date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('line_suspected_calculates');
    }
};
