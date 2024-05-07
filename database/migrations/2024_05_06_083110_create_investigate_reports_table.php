<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestigateReportsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('investigate_reports', function (Blueprint $table) {
            $table->id();
            $table->string('interviewer_name')->nullable();
            $table->date('interview_date')->nullable();
            $table->string('interviewer_designation')->nullable();
            $table->string('interviewer_contact_number')->nullable();
            $table->string('suspected_name')->nullable();
            $table->string('suspected_gender')->nullable();
            $table->string('suspect_age')->nullable();
            $table->string('suspect_occupation')->nullable();
            $table->string('suspect_address')->nullable();
            $table->json('suspect_education')->nullable()->comment('Full education details');
            $table->text('respondent_name')->nullable();
            $table->text('respondent_age')->nullable();
            $table->text('respondent_contact')->nullable();
            $table->text('respondent_address')->nullable();
            $table->text('relationship_with_suspect')->nullable();
            $table->text('healthcare_worker_facility_name')->nullable();
            $table->text('specify_other_name')->nullable();
            $table->text('suspect_contact_with_animals')->nullable();
            $table->json('animal_species')->nullable()->comment('Full Relationship to deceased / suspected patient');
            $table->json('type_of_animal')->nullable()->comment('Type Of Animal');
            $table->date('deceased_date')->nullable();
            $table->text('place_of_exposure')->nullable();
            $table->text('place_of_exposure_address')->nullable();
            $table->json('location_of_bite')->nullable()->comment('Location of bite');
            $table->json('number_of_wounds')->nullable()->comment('Number of Wounds and their Anatomical Location');
            $table->json('sign_of_disease')->nullable()->comment('');
            $table->text('animal_die_exposure')->nullable();
            $table->date('animal_die_date')->nullable();
            $table->text('animal_tested_rabies')->nullable();
            $table->text('animal_vaccinated')->nullable();
            $table->json('treatment_applied')->nullable()->comment('Treatment applied at home');
            $table->string('suturesa_applied')->nullable();
            $table->string('reason_for_suturing')->nullable();
            $table->string('rig_infiltration')->nullable();
            $table->text('rabiesVaccineRecieved')->nullable();
            $table->text('RabiesVaccineReceivedYes')->nullable();
            $table->json('rabies_vaccine_received')->nullable()->comment('Details of Rabies vaccine received');
            $table->json('incomplete_pep')->nullable()->comment('If Incomplete PEP,reason');
            $table->string('rabies_immunoglobulin')->nullable();
            $table->string('rabies_immunoglobulin_site')->nullable();
            $table->string('brand_name')->nullable();
            $table->string('rig_administration')->nullable();
            $table->string('year_no_of_dose')->nullable();
            $table->string('vaccinated_against_rabies')->nullable();
            $table->string('TT_vaccine')->nullable();
            $table->string('fever')->nullable();
            $table->string('headache')->nullable();
            $table->string('vomiting')->nullable();
            $table->string('muscle_spasm')->nullable();
            $table->string('anorexia')->nullable();
            $table->string('priapism')->nullable();
            $table->string('aerophobia')->nullable();
            $table->string('localized_weakness')->nullable();
            $table->string('confusion')->nullable();
            $table->string('agitation')->nullable();
            $table->string('autonomic_instability')->nullable();
            $table->string('insomnia')->nullable();
            $table->string('malaise')->nullable();
            $table->string('nausea')->nullable();
            $table->string('anxiety')->nullable();
            $table->string('dysphasia')->nullable();
            $table->string('ataxia')->nullable();
            $table->string('seizures')->nullable();
            $table->string('hydrophobia')->nullable();
            $table->string('localized_pain')->nullable();
            $table->string('delirium')->nullable();
            $table->string('aggressiveness')->nullable();
            $table->string('hyperactivity')->nullable();
            $table->string('hypersalivation')->nullable();
            $table->string('symptoms_onset_date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('alive')->nullable();
            $table->string('deceased_die')->nullable();
            $table->string('deceased_die_health_facility_input')->nullable();
            $table->string('deceased_die_other_input')->nullable();
            $table->string('medical_help')->nullable();
            $table->date('hf_1date')->nullable();
            $table->date('hf_2date')->nullable();
            $table->date('hf_3date')->nullable();
            $table->json('laboratory_specific_test')->nullable()->comment(' Laboratory specific test (ELISA/PCR/FAT) performed');
            $table->string('MRI_brain_done')->nullable();
            $table->string('postmortem')->nullable();
            $table->string('copy_of_report')->nullable();
            $table->string('evidence_of_recent_wounds')->nullable();
            $table->string('evidence_of_healed_wounds')->nullable();
            $table->string('certificate_available')->nullable();
            $table->string('death_mentioned')->nullable();
            $table->string('contact_tracking')->nullable();
            $table->string('autopsy_of_additional_cases')->nullable();
            $table->json('family')->nullable();
            $table->json('community')->nullable();
            $table->json('hospital_workers')->nullable();
            $table->json('any_other')->nullable();
            $table->json('animal_suspected_transmitting')->nullable()->comment('Collect the names and contact information');
            $table->string('probable_rabies')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investigate_reports');
    }
}
