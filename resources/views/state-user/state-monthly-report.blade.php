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
      <form method="POST" action="{{route('state.monthly-report-store')}}" id="monthly_report_store">
        @csrf
      <table class="w-auto">
        <tbody>
          <tr class="">
            <td>
              <p>
                <strong>State Name </strong>
              </p>
            </td>
            <td>
              <input type="text" name="state_name" value="{{ old('state_name') }}">
              @if ($errors->has('state_name')) 
                <span class="form-text text-muted">{{ $errors->first('state_name') }}</span>
              @endif
            </td>
          </tr>
          <tr class="">
            <td>
              <p>
                <strong>Name of State Nodal Office</strong>
              </p>
            </td>
            <td>
              <input type="text" name="state_nodal_office" value="{{ old('state_nodal_office') }}">
              @if ($errors->has('state_nodal_office')) 
                <span class="form-text text-muted">{{ $errors->first('state_nodal_office') }}</span>
              @endif
            </td>
          </tr>
          <tr class="">
            <td>
              <p>
                <strong>Office Address</strong>
              </p>
            </td>
            <td>
                <input type="text" name="office_address" value="{{ old('office_address') }}">
                @if ($errors->has('office_address')) 
                    <span class="form-text text-muted">{{ $errors->first('office_address') }}</span>
                @endif
            </td>
          </tr>
          <tr class="">
            <td>
              <p>
                <strong>Reporting Month &amp; Year</strong>
              </p>
            </td>
            <td>
                <input type="date" name="reporting_month_year" value="{{ old('reporting_month_year') }}">
                @if ($errors->has('reporting_month_year')) 
                    <span class="form-text text-muted">{{ $errors->first('reporting_month_year') }}</span>
                @endif
            </td>
          </tr>
        </tbody>
      </table>
      <h3 class="title ml-0"> Detailed Monthly Report: - </h3>
      <table class="">
        <tbody>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Total districts in the state </strong>
              </p>
            </td>
            <td colspan="3">
                <input type="text" name="total_districts" value="{{ old('total_districts') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Total no. of health facilities providing animal bite management in the state</strong>
              </p>
            </td>
            <td colspan="3">
                <input type="text" name="total_health_facilities_anaimal_bite" value="{{ old('total_health_facilities_anaimal_bite') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Total Number of facilities submitted monthly report under NRCP </strong>
              </p>
            </td>
            <td colspan="3">
                <input type="text" name="total_health_facilities_submitted_monthly" value="{{ old('total_health_facilities_submitted_monthly') }}">            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Mention total no. of patients as per type of biting animal-</strong>
              </p>
            </td>
            <td colspan="3">
                <input type="text" name="total_patients_animal_biting" value="{{ old('total_patients_animal_biting') }}">
            </td>
          </tr>
          <tr>
            <td rowspan="2">
              <ul>
                <li>Dog</li>
              </ul>
            </td>
            <td>
              <p>Bite by Stray dog</p>
            </td>
            <td colspan="3">
                <input type="text" name="total_stray_dog_bite" value="{{ old('total_stray_dog_bite') }}">
            </td>
          </tr>
          <tr>
            <td>
              <p>Bite by Pet Dogs</p>
            </td>
            <td colspan="3">
                <input type="text" name="total_pet_dog_bite" value="{{ old('total_pet_dog_bite') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Cat</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="total_cat_bite" value="{{ old('total_cat_bite') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Monkey</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="total_monkey_bite" value="{{ old('total_monkey_bite') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Others</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="total_others_bite" value="{{ old('total_others_bite') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <p>
                <strong>Mention no. of patients as per Category of bite-</strong>
              </p>
            </td>
            <td colspan="3">
                {{-- <input type="text" readonly> --}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>
                  <strong>Category -I</strong> (Touching or feeding of animals, Licks on intact skin Contact of intact skin with secretions /excretions of rabid animal/human case)
                </li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="mention_patient_cateogry_I" value="{{ old('mention_patient_cateogry_I') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>
                  <strong>Category -II</strong> (Nibbling of uncovered skin, Minor scratches or abrasions without bleeding)
                </li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="mention_patient_cateogry_II" value="{{ old('mention_patient_cateogry_II') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>
                  <strong>Category -III</strong> (Single or multiple transdermal bites or scratches, licks on broken skin Contamination of mucous membrane with saliva i.e. licks)
                </li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="mention_patient_cateogry_III" value="{{ old('mention_patient_cateogry_III') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Total number of patients as per route of rabies vaccination- </strong>
              </p>
            </td>
            <td colspan="3">
              {{-- <input type="text"> --}}
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
                <input type="text" name="rabies_vaccination_im_route" value="{{ old('rabies_vaccination_im_route') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>ID route (update Thai Red Cross Regimen) (2-2-2-0-2)</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="rabies_vaccination_id_route" value="{{ old('rabies_vaccination_id_route') }}">
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
                <input type="text" name="rabies_vaccination_III_victim_ars" value="{{ old('rabies_vaccination_III_victim_ars') }}">
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
                <input type="text" name="rabies_vaccination_completed_pep" value="{{ old('rabies_vaccination_completed_pep') }}">
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="dashboard-filter mb-5">
      <table class="">
        <tbody>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Suspected/</strong>
                <strong>probable/</strong>
                <strong>Confirmed Rabies Cases/ Deaths reported by all the districts-</strong>
              </p>
            </td>
            <td colspan="3">
              {{-- <input type="text"> --}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>No. of human rabies deaths confirmed by laboratory tests</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="confirmed_suspected_rabies_deaths" value="{{ old('confirmed_suspected_rabies_deaths') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>No. of clinically suspected rabies cases seen at OPD &amp; Emergency (who refused admission)</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="suspected_rabies_cases_opd" value="{{ old('suspected_rabies_cases_opd') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>No. of clinically suspect rabies cases admitted in the health facilities</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="suspected_rabies_cases_admitted" value="{{ old('suspected_rabies_cases_admitted') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>No. of clinically suspected rabies cases left against medical advice (after admission) </li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="suspected_rabies_cases_left_against_medical" value="{{ old('suspected_rabies_cases_left_against_medical') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>No. of clinically suspect rabies deaths in hospital</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="suspected_rabies_deaths" value="{{ old('suspected_rabies_deaths') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Status of Anti Rabies Vaccine (ARV) used by all the districts in the month (no. of vials)-</strong>
              </p>
            </td>
            <td colspan="3">
              {{-- <input type="text"> --}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Opening balance</li>
              </ul>
            </td>
            <td colspan="3">
                <input type="text" name="arv_opening_balance" value="{{ old('arv_opening_balance') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Quantity received</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="arv_quantity_received" value="{{ old('arv_quantity_received') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Quantity utilized</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="arv_quantity_utilized" value="{{ old('arv_quantity_utilized') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Closing balance</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="arv_closing_balance" value="{{ old('arv_closing_balance') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Shortage of ARV - Yes/No</li>
              </ul>
              <p>(If Yes, please mention in Vials or Doses)</p>
            </td>
            <td colspan="3">
              <input type="text" name="shortage_of_arv" value="{{ old('shortage_of_arv') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Status of Anti Rabies Serum (ARS) used by all the districts in the month (no. of vials)-</strong>
              </p>
            </td>
            <td colspan="3">
              {{-- <input type="text"> --}}
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Opening balance</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="ars_opening_balance" value="{{ old('ars_opening_balance') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Quantity received</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="ars_quantity_recieved" value="{{ old('ars_quantity_recieved') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Quantity utilized</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="ars_quantity_utilized" value="{{ old('ars_quantity_utilized') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Closing balance</li>
              </ul>
            </td>
            <td colspan="3">
              <input type="text" name="ars_closing_balance" value="{{ old('ars_closing_balance') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>Shortage of ARS - Yes/No</li>
              </ul>
              <p>&nbsp;(If Yes, please mention in Vials or Doses)</p>
            </td>
            <td colspan="3">
              <input type="text" name="shortage_of_ars" value="{{ old('shortage_of_ars') }}" >
            </td>
          </tr>
          <tr class="bglightBlue">
            <td colspan="2">
              <p>
                <strong>Status of availability of Rabies Vaccine in the state (Health facility wise)-</strong>
              </p>
            </td>
            <td>
              <p>
                <strong>Total no of health facilities</strong>
              </p>
            </td>
            <td>
              <p>
                <strong>Availability of ARV</strong>
              </p>
            </td>
            <td>
              <p>
                <strong>Availability of ARS</strong>
              </p>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>DH</li>
              </ul>
            </td>
            <td><input type="text" name="dh_health_of_health_facilties" value="{{ old('dh_health_of_health_facilties') }}"></td>
            <td><input type="text" name="dh_of_arv" value="{{ old('dh_of_arv') }}"></td>
            <td><input type="text" name="dh_of_ars" value="{{ old('dh_of_ars') }}"></td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>SDH</li>
              </ul>
            </td>
            <td><input type="text" name="sdh_health_of_health_facilties" value="{{ old('sdh_health_of_health_facilties') }}"></td>
            <td><input type="text" name="sdh_of_arv" value="{{ old('sdh_of_arv') }}"></td>
            <td><input type="text" name="sdh_of_ars" value="{{ old('sdh_of_ars') }}"></td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>CHC</li>
              </ul>
            </td>
            <td><input type="text" name="chc_health_of_health_facilties" value="{{ old('chc_health_of_health_facilties') }}"></td>
            <td><input type="text" name="chc_of_arv" value="{{ old('chc_of_arv') }}"></td>
            <td><input type="text" name="chc_of_ars" value="{{ old('chc_of_ars') }}"></td>
          </tr>
          <tr>
            <td colspan="2">
              <ul>
                <li>PHC</li>
              </ul>
            </td>
            <td><input type="text" name="phc_health_of_health_facilties" value="{{ old('phc_health_of_health_facilties') }}"></td>
            <td><input type="text" name="phc_of_arv" value="{{ old('phc_of_arv') }}"></td>
            <td><input type="text" name="phc_of_ars" value="{{ old('phc_of_ars') }}"></td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Information on Rabies and Animal Bite cases shared with State Veterinary Officer/department or concerned department </strong>
              </p>
            </td>
            <td colspan="3">
              <input type="text" name="bite_cases_shared_department" value="{{ old('bite_cases_shared_department') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Any Clustering of Animal Bite Cases observed? </strong>
              </p>
              <p>If yes write the details including locality</p>
            </td>
            <td colspan="3">
              <input type="text" name="bite_cases_observed" value="{{ old('bite_cases_observed') }}">
            </td>
          </tr>
          <tr>
            <td colspan="2" class="bglightBlue">
              <p>
                <strong>Any other remarks</strong>
              </p>
            </td>
            <td colspan="3">
              <input type="text" name="other_remarks" value="{{ old('other_remarks') }}">
            </td>
          </tr>
        </tbody>
      </table>
      <div class="footerContent">        
       <div class="d-flex justify-content-center mb-5">
        <button type="submit" class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
        <button type="reset" class="btn search-patient-btn bg-danger text-light">Reset</button>
       </div>
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
          <em>*Compiled Monthly report of Animal Bite Victims receiving treatment at all Anti Rabies Clinics/Health facilities providing animal bite management (T</em>
          <em>o be submitted by State Nodal Officer to NRCP division&nbsp; &nbsp;NCDC Delhi before 5th day of every month)</em>
        </p>
      </div>
    </form>
    </div>
  </div>
</div>

 @endsection