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
        Schema::create('state_monthly_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id',);
            $table->foreignId('state_id');
            $table->string('state_nodal_office', 255)->nullable();
            $table->string('office_address', 255)->nullable();
            $table->date('reporting_month_year', 255)->nullable();
            $table->string('total_districts', 255)->nullable();
            $table->string('total_health_facilities_anaimal_bite', 255)->nullable();
            $table->string('total_health_facilities_submitted_monthly', 255)->nullable();
            $table->string('total_patients_animal_biting', 255)->nullable();
            $table->string('total_stray_dog_bite', 255)->nullable();
            $table->string('total_pet_dog_bite', 255)->nullable();
            $table->string('total_dog_bite', 255)->nullable();
            $table->string('total_cat_bite', 255)->nullable();
            $table->string('total_monkey_bite', 255)->nullable();
            $table->string('total_others_bite', 255)->nullable();
            $table->string('mention_patient_cateogry_I', 255)->nullable();
            $table->string('mention_patient_cateogry_II', 255)->nullable();
            $table->string('mention_patient_cateogry_III', 255)->nullable();
            $table->string('rabies_vaccination_im_route', 255)->nullable();
            $table->string('rabies_vaccination_id_route', 255)->nullable();
            $table->string('rabies_vaccination_III_victim_ars', 255)->nullable();
            $table->string('rabies_vaccination_completed_pep', 255)->nullable();
            $table->string('confirmed_suspected_rabies_deaths', 255)->nullable();
            $table->string('suspected_rabies_cases_opd', 255)->nullable();
            $table->string('suspected_rabies_cases_admitted', 255)->nullable();
            $table->string('suspected_rabies_cases_left_against_medical', 255)->nullable();
            $table->string('suspected_rabies_deaths', 255)->nullable();
            $table->string('arv_opening_balance', 255)->nullable();
            $table->string('arv_quantity_received', 255)->nullable();
            $table->string('arv_quantity_utilized', 255)->nullable();
            $table->string('arv_closing_balance', 255)->nullable();
            $table->string('shortage_of_arv', 255)->nullable();
            $table->string('ars_opening_balance', 255)->nullable();
            $table->string('ars_quantity_recieved', 255)->nullable();
            $table->string('ars_quantity_utilized', 255)->nullable();
            $table->string('ars_closing_balance', 255)->nullable();
            $table->string('shortage_of_ars', 255)->nullable();
            $table->string('dh_health_of_health_facilties', 255)->nullable();
            $table->string('dh_of_arv', 255)->nullable();
            $table->string('dh_of_ars', 255)->nullable();
            $table->string('sdh_health_of_health_facilties', 255)->nullable();
            $table->string('sdh_of_arv', 255)->nullable();
            $table->string('sdh_of_ars', 255)->nullable();
            $table->string('chc_health_of_health_facilties', 255)->nullable();
            $table->string('chc_of_arv', 255)->nullable();
            $table->string('chc_of_ars', 255)->nullable();
            $table->string('phc_health_of_health_facilties', 255)->nullable();
            $table->string('phc_of_arv', 255)->nullable();
            $table->string('phc_of_ars', 255)->nullable();
            $table->string('bite_cases_shared_department', 255)->nullable();
            $table->string('bite_cases_observed', 255)->nullable();
            $table->string('other_remarks', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_monthly_reports');
    }
};
