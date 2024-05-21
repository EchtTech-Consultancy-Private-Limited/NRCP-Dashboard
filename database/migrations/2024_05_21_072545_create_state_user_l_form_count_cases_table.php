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
        Schema::create('state_user_l_form_count_cases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('state_user_l_forms_id');
            $table->integer('lform_state_id')->nullable();
            $table->integer('lform_district_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->string('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('lform_subdistrict')->nullable();
            $table->string('lform_village')->nullable();
            $table->string('lform_biting_animal')->nullable();
            $table->string('lform_speciman_type')->nullable();
            $table->string('lform_speciman_detail')->nullable();
            $table->date('lform_sample_collection_date')->nullable();
            $table->string('number_of_test_performed')->nullable();
            $table->string('lform_result')->nullable();
            $table->date('lform_result_declaration_date')->nullable();
            $table->string('lform_remark')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_user_l_form_count_cases');
    }
};
