@extends('layouts.main')
@section('title') {{ 'NRCP State Dashboard | Monthly Report' }}
@endsection
@section('content')

<div class="container-fluid dashboard">
    <div class="form-tab">
        <div class="dashboard-filter mb-5">
            <div class="logoHeader">
                <img src="{{ asset('state-assets/images/undp.png') }}" />
                <img src="{{ asset('state-assets/images/emblem.jpg') }}" />
                <img src="{{ asset('state-assets/images/nrcpLogo.png') }}" />
            </div>
            <div class="logoTitle">
                <p>National Centre for Disease Control</p>
                <p>Ministry of Health &amp; Family Welfare, Govt. of India</p>
                <p>State Monthly Report (NRCP-M02) <strong> *</strong>
                </p>
            </div>
            <table class="">
                <tbody>
                    <tr class="">
                        <td>
                            <p>
                                <strong>State Name</strong>
                            </p>
                        </td>
                        <td>
                            {{ old('state_name', $stateMonthlyReport->states->state_name) }}
                        </td>
                    </tr>
                    <tr class="">
                        <td>
                            <p>
                                <strong>Name of State Nodal Office</strong>
                            </p>
                        </td>
                        <td>
                            {{ old('state_nodal_office', $stateMonthlyReport->state_nodal_office) }}
                        </td>
                    </tr>
                    <tr class="">
                        <td>
                            <p>
                                <strong>Office Address</strong>
                            </p>
                        </td>
                        <td>
                            {{ old('office_address', $stateMonthlyReport->office_address) }}
                        </td>
                    </tr>
                    <tr class="">
                        <td>
                            <p>
                                <strong>Reporting Month &amp; Year</strong>
                            </p>
                        </td>
                        <td>
                            {{ old('reporting_month_year', date('d-m-Y', strtotime($stateMonthlyReport->reporting_month_year))) }}
                        </td>
                    </tr>
                </tbody>

            </table>
            <h3 class="title ml-0 mt-4"> Detailed Monthly Report: - </h3>
            <table class="">
                <tbody>
                    <tr>
                        <td colspan="2" class="bglightBlue">
                            <p><strong>Total districts in the state </strong></p>
                        </td>
                        <td colspan="3">{{ old('total_districts', $stateMonthlyReport->total_districts) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bglightBlue">
                            <p><strong>Total no. of health facilities providing animal bite management in the
                                    state</strong></p>
                        </td>
                        <td colspan="3">
                            {{ old('total_health_facilities_anaimal_bite', $stateMonthlyReport->total_health_facilities_anaimal_bite) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bglightBlue">
                            <p><strong>Total Number of facilities submitted monthly report under NRCP </strong></p>
                        </td>
                        <td colspan="3">
                            {{ old('total_health_facilities_submitted_monthly', $stateMonthlyReport->total_health_facilities_submitted_monthly) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bglightBlue">
                            <p><strong>Mention total no. of patients as per type of biting animal-</strong></p>
                        </td>
                        <td colspan="3">
                            {{ old('total_patients_animal_biting', $stateMonthlyReport->total_patients_animal_biting) }}
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="3">
                            <ul>
                                <li>Dog</li>
                            </ul>
                        </td>
                        <td>
                            <p>Bite by Stray dog</p>
                        </td>
                        <td colspan="3">{{ old('total_stray_dog_bite', $stateMonthlyReport->total_stray_dog_bite) }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>Bite by Pet Dogs</p>
                        </td>
                        <td colspan="3">{{ old('total_pet_dog_bite', $stateMonthlyReport->total_pet_dog_bite) }}</td>
                    </tr>
                    <tr>
                        <td>
                          <p>Total Dogs Bite</p>
                        </td>
                        <td colspan="3">{{ old('total_dog_bite',$stateMonthlyReport->total_dog_bite) }}
                        </td>
                      </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Cat</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('total_cat_bite', $stateMonthlyReport->total_cat_bite) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Monkey</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('total_monkey_bite', $stateMonthlyReport->total_monkey_bite) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Others</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('total_others_bite', $stateMonthlyReport->total_others_bite) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p><strong>Mention no. of patients as per Category of bite-</strong></p>
                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li><strong>Category -I</strong> (Touching or feeding of animals, Licks on intact skin
                                    Contact of intact skin with secretions /excretions of rabid animal/human case)</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('mention_patient_cateogry_I', $stateMonthlyReport->mention_patient_cateogry_I) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li><strong>Category -II</strong> (Nibbling of uncovered skin, Minor scratches or
                                    abrasions without bleeding)</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('mention_patient_cateogry_II', $stateMonthlyReport->mention_patient_cateogry_II) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li><strong>Category -III</strong> (Single or multiple transdermal bites or scratches,
                                    licks on broken skin Contamination of mucous membrane with saliva i.e. licks)</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{  @$stateMonthlyReport->mention_patient_cateogry_III}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bglightBlue">
                            <p><strong>Total number of patients as per route of rabies vaccination- </strong></p>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>IM route (Essen schedule on day) (0,3,7,14,28)</li>
                            </ul>
                            <p></p>
                        </td>
                        <td colspan="3">
                            {{ old('rabies_vaccination_im_route', $stateMonthlyReport->rabies_vaccination_im_route) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>ID route (update Thai Red Cross Regimen) (2-2-2-0-2)</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('rabies_vaccination_id_route', $stateMonthlyReport->rabies_vaccination_id_route) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>No. of Category III victims given ARS</li>
                            </ul>
                            <p>&nbsp;</p>
                        </td>
                        <td colspan="3">
                            {{ old('rabies_vaccination_III_victim_ars', $stateMonthlyReport->rabies_vaccination_III_victim_ars) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Number of Patients completed PEP</li>
                            </ul>
                            <p>&nbsp;</p>
                        </td>
                        <td colspan="3">
                            {{ old('rabies_vaccination_completed_pep', $stateMonthlyReport->rabies_vaccination_completed_pep) }}
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
        <div class="dashboard-filter mb-5">
            <table class="">
                <tbody>
                    <tr>
                        <td colspan="5" class="bglightBlue">
                            <p>
                                <strong>Suspected/</strong>
                                <strong>probable/</strong>
                                <strong>Confirmed Rabies Cases/ Deaths reported by all the districts-</strong>
                            </p>
                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>No. of human rabies deaths confirmed by laboratory tests</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('confirmed_suspected_rabies_deaths', $stateMonthlyReport->confirmed_suspected_rabies_deaths) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>No. of clinically suspected rabies cases seen at OPD &amp; Emergency (who refused
                                    admission)</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('suspected_rabies_cases_opd', $stateMonthlyReport->suspected_rabies_cases_opd) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>No. of clinically suspect rabies cases admitted in the health facilities</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('suspected_rabies_cases_admitted', $stateMonthlyReport->suspected_rabies_cases_admitted) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>No. of clinically suspected rabies cases left against medical advice (after
                                    admission) </li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('suspected_rabies_cases_left_against_medical', $stateMonthlyReport->suspected_rabies_cases_left_against_medical) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>No. of clinically suspect rabies deaths in hospital</li>
                            </ul>
                        </td>
                        <td colspan="3">
                            {{ old('suspected_rabies_deaths', $stateMonthlyReport->suspected_rabies_deaths) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bglightBlue">
                            <p>
                                <strong>Status of Anti Rabies Vaccine (ARV) used by all the districts in the month (no.
                                    of vials)-</strong>
                            </p>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Opening balance</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('arv_opening_balance', $stateMonthlyReport->arv_opening_balance) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Quantity received</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('arv_quantity_received', $stateMonthlyReport->arv_quantity_received) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Quantity utilized</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('arv_quantity_utilized', $stateMonthlyReport->arv_quantity_utilized) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Closing balance</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('arv_closing_balance', $stateMonthlyReport->arv_closing_balance) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Shortage of ARV - Yes/No</li>
                            </ul>
                            <p>(If Yes, please mention in Vials or Doses)</p>
                        </td>
                        <td colspan="3">{{ old('shortage_of_arv', $stateMonthlyReport->shortage_of_arv) }}</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bglightBlue">
                            <p>
                                <strong>Status of Anti Rabies Serum (ARS) used by all the districts in the month (no. of
                                    vials)-</strong>
                            </p>
                        </td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Opening balance</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('ars_opening_balance', $stateMonthlyReport->ars_opening_balance) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Quantity received</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('ars_quantity_recieved', $stateMonthlyReport->ars_quantity_recieved) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul>
                                <li>Quantity utilized</li>
                            </ul>
                        </td>
                        <td colspan="3">{{ old('ars_quantity_utilized', $stateMonthlyReport->ars_quantity_utilized) }}
                        </td>
                    </tr>
                    <tr>

            </table>
            <div class="footerContent">
                <p>
                    <strong class="d-flex justify-content-between">
                        <span>Date:</span>
                        <span> Name &amp; Sign of State Nodal Officer- <br> NRCP or Concerned officer&nbsp; </span>
                    </strong>
                </p>
                <p>
                    <strong></strong>
                </p>
                <p>
                    <em>*Compiled Monthly report of Animal Bite Victims receiving treatment at all Anti Rabies
                        Clinics/Health facilities providing animal bite management (T</em>
                    <em>o be submitted by State Nodal Officer to NRCP division&nbsp; &nbsp;NCDC Delhi before 5th day of
                        every month)</em>
                </p>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection