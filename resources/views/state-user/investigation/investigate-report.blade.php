@extends('layouts.main')
@section('title')
    {{ 'NRCP State Dashboard | Investigate Report' }}
@endsection
@section('content')
  <form action="{{ route('state.investigate-store') }}" method="post">
    @csrf
    <div class="container-fluid">
        <div class="container bg-light mb-4">
            <table>
                <tbody>
                    <tr>
                        <td colspan="38">
                            <div class="pdfLogo">
                                <div>
                                    <img src="{{ asset('state-assets/images/undp.png') }}">
                                </div>
                                <div>
                                    <p>
                                        <strong>National Rabies Control Program</strong>
                                    </p>
                                    <p>
                                        <strong>National Centre for Disease Control</strong>
                                    </p>
                                    <p>
                                        <strong>Directorate General of Health Services</strong>
                                    </p>
                                    <p>
                                        <strong>Ministry of Health and Family Welfare</strong>
                                    </p>
                                    <p>
                                        <strong>Government of India</strong>
                                    </p>
                                </div>
                                <div>
                                    <img src="{{ asset('state-assets/images/nrcpLogo.png') }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38" style="text-align: center;">
                            <p>
                                <strong>INVESTIGATION FORM FOR SUSPECTED HUMAN RABIES CASE</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38" class="bglightBlue">
                            <p>
                                <strong>1. Information about interviewer</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p>Name of interviewer</p>
                        </td>
                        <td colspan="18" class="bggrey">
                            <input type="text" name="intervewer_name" value="{{ old('intervewer_name') }}">
                            @if ($errors->has('intervewer_name'))
                                <span class="form-text text-muted">{{ $errors->first('intervewer_name') }}</span>
                            @endif
                        </td>
                        <td colspan="10">
                            <p>Date of Interview</p>
                        </td>
                        <td colspan="5" class="bggrey">
                            <input name="interview_date" value="{{ old('interview_date') }}" type="date">
                            @if ($errors->has('interview_date'))
                                <span class="form-text text-muted">{{ $errors->first('interview_date') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p>Designation</p>
                        </td>
                        <td colspan="18" class="bggrey">
                            <input name="intervewer_designation" value="{{ old('intervewer_designation') }}" type="text">
                            @if ($errors->has('intervewer_designation'))
                                <span class="form-text text-muted">{{ $errors->first('intervewer_designation') }}</span>
                            @endif
                        </td>
                        <td colspan="10">
                            <p>Contact number</p>
                        </td>
                        <td colspan="5" class="bggrey">
                            <input name="intervewer_contact_number" value="{{ old('intervewer_contact_number') }}" type="text" oninput="validateInput(this)" maxlength="12">
                            @if ($errors->has('intervewer_contact_number'))
                                <span class="form-text text-muted">{{ $errors->first('intervewer_contact_number') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38" class="bglightBlue">
                            <p>
                                <strong>2. Information about Deceased/ Suspected patient</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>&nbsp;Name</p>
                        </td>
                        <td colspan="15" class="bggrey">
                            <input name="suspected_name" type="text" value="{{ old('suspected_name') }}">
                        </td>
                        <td colspan="4">
                            <p>&nbsp;Sex</p>
                        </td>
                        <td colspan="9" class="bggrey">
                            <select class="form-select" name="suspected_gender" aria-label="Default select example" id="gender">
                                <option value=""> Select Gender</option> 
                                @if(old('suspected_gender')) 
                                <option value="{{ old('suspected_gender') }}" selected>{{ old('suspected_gender') }}</option> 
                                @endif 
                                <option value="Male"> Male</option>
                                <option value="Famale"> Famale</option>
                                <option value="Other"> Other</option>
                              </select>
                            @if ($errors->has('suspected_gender')) <span class="form-text text-muted">{{ $errors->first('suspected_gender') }}</span> @endif
                        </td>
                        <td colspan="7">
                            <p>&nbsp;Age</p>
                        </td>
                        <td class="bggrey">
                            <input type="text" name="suspect_age" value="{{ old('suspect_age') }}" maxlength="2" oninput="validateInput(this)">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Occupation</p>
                        </td>
                        <td colspan="11" class="bggrey">
                            <input type="text" name="suspect_occupation" value="{{ old('suspect_occupation') }}">
                        </td>
                        <td colspan="4">
                            <p>Address</p>
                        </td>
                        <td colspan="21" class="bggrey">
                            <input name="suspect_address" type="text" value="{{ old('suspect_address') }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>Level of education</p>
                        </td>
                        <td colspan="10">
                            <input type="text" name="suspect_education[][level1]">
                        </td>
                        <td colspan="13">
                            <input type="text" name="suspect_education[][level2]">
                        </td>
                        <td colspan="8">
                            <input type="text" name="suspect_education[][level3]">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" id="Illiterate" name="suspect_education[][Illiterate]" value="Illiterate">
                                <label for="Illiterate">Illiterate</label>
                            </p>
                        </td>
                        <td colspan="15">
                            <p>
                                <input type="checkbox" id="PrimarySchool" name="suspect_education[][primary_school]" value="Primary School">
                                <label for="PrimarySchool">Primary School</label>
                            </p>
                        </td>
                        <td colspan="9">
                            <p>
                                <input type="checkbox" id="Graduate" name="suspect_education[][graduate]" value="Graduate">
                                <label for="Graduate">Graduate</label>
                            </p>
                        </td>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" id="ProfessionalDegree" name="suspect_education[][professional_dgree]" value="Professional Degree">
                                <label for="ProfessionalDegree">Professional Degree</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" id="BelowPrimary" name="suspect_education[][below_primary]" aria-valuemax="Below Primary">
                                <label for="BelowPrimary"> Below Primary</label>
                            </p>
                        </td>
                        <td colspan="15">
                            <p>
                                <input type="checkbox" id="SecondarySchool" name="suspect_education[][secondary_school]" value="Secondary School">
                                <label for="SecondarySchool"> Secondary School</label>
                            </p>
                        </td>
                        <td colspan="9">
                            <p>
                                <input type="checkbox" name="suspect_education[][postgraduate]" value="Postgraduate">
                                <label for="Postgraduate"> Postgraduate</label>
                            </p>
                        </td>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" id="Unknown" name="suspect_education[][unknown]" value="Unknown">
                                <label for="Unknown">    Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" name="suspect_education[][other]" value="Other(Specify)">
                                <label for="Other(Specify)">Other (Specify)</label>
                            </p>
                        </td>
                        <td colspan="31" class="bggrey">
                            <input type="text" name="suspect_education[][other_specify_text]">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>Is/was patient immunocompromised? (if yes, provide details) 
                                <input type="text" name="suspect_education[][details]"></p>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38" class="bglightBlue">
                            <p>
                                <strong>3. Information about respondent</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p>Name of respondent</p>
                        </td>
                        <td colspan="12">
                            <input type="text" name="respondent_name" value="{{ old('respondent_name') }}">
                        </td>
                        <td colspan="10">
                            <p>Age of respondent</p>
                        </td>
                        <td colspan="11">
                            <input type="text" name="respondent_age" value="{{ old('respondent_age') }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p>Contact number</p>
                        </td>
                        <td colspan="12">
                            <input type="text" name="respondent_contact" value="{{ old('respondent_contact') }}">
                        </td>
                        <td colspan="10">
                            <p>Address (if different from patient)</p>
                        </td>
                        <td colspan="11">
                            <input type="text" name="respondent_address" value="{{ old('respondent_address') }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>Relationship to deceased / suspected patient</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Parent1" value="Parent">
                                <label for="Parent1">Parent</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Sibling1" value="Sibling">
                                <label for="Sibling1">Sibling</label>
                            </p>
                        </td>
                        <td colspan="13">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Parent-in-law1" value="Parent-in-law">
                                <label for="Parent-in-law1">Parent-in-law</label>
                            </p>
                        </td>
                        <td colspan="11">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Community-leader1" value="Community-leader">
                                <label for="Community-leader1">Community leader</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Husband-wife1" value="Husband-wife">
                                <label for="Husband-wife1">Husband/wife</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Child1" value="Child">
                                <label for="Child1">Child</label>
                            </p>
                        </td>
                        <td colspan="13">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Friend-neighbour1" value="Friend-neighbour">
                                <label for="Friend-neighbour1">Friend or neighbour</label>
                            </p>
                        </td>
                        <td colspan="11">
                            <p>
                                <input type="radio" name="relationship_with_suspect" id="Son-in-law-daughter-in-law1" value="Son-in-law/daughter-in-law">
                                <label for="Son-in-law-daughter-in-law1">Son-in-law/daughter-in-law</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="14">
                            <p>
                                <input type="radio" name="relationship_with_suspect" id="Health-care-worker1" value="Health care worker (facility name)">
                                <label for="Health-care-worker1">Health care worker (facility name):</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <input type="text" name="healthcare_worker_facility_name">
                        </td>
                        <td colspan="11">
                            <p>
                                <input type="radio" id="Other1" name="relationship_with_suspect" value="Other(specify)">
                                <label for="Other1">Other(specify):</label>
                            </p>
                        </td>
                        <td colspan="5">
                            <input type="text" name="specify_other_name">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38" class="bglightBlue">
                            <p>
                                <strong>4. Exposure History (during previous 12 months)</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>Did deceased / suspected patient have any contacts with animals (bites, scratches, and licks)
                                within 12 months before the illness?</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="radio" id="CategoryI1" name="suspect_contact_with_animals" value="category1">
                                <label for="CategoryI1">Yes, Category I exposure</label>
                            </p>
                        </td>
                        <td colspan="38">
                            <p>Touching or feeding of animals, licks on intact skin.</p>
                            <p>Contact of intact skin with secretions /excretions of rabid animal/human case.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="radio" id="CategoryII1" name="suspect_contact_with_animals" value="category2">
                                <label for="CategoryII1">Yes, Category II exposure</label>
                            </p>
                        </td>
                        <td colspan="38">
                            <p>Nibbling of uncovered skin.</p>
                            <p>Minor scratches or abrasions without bleeding.</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="radio" id="CategoryIII1" name="suspect_contact_with_animals" value="category3">
                                <label for="CategoryIII1">Yes, Category III exposure</label>
                            </p>
                        </td>
                        <td colspan="38">
                            <p>Single or multiple transdermal bites or scratches, licks on broken skin.</p>
                            <p>Contamination of mucous membrane with saliva (i.e. licks).</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="17">
                            <p>
                                <input type="radio" id="No1" name="suspect_contact_with_animals" value="No">
                                <label for="No1">No</label>
                            </p>
                        </td>
                        <td colspan="21">
                            <p>
                                <input type="radio" id="Unknown1" name="suspect_contact_with_animals" value="Unknown">
                                <label for="Unknown1">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>
                                <strong>If yes, please describe the animal contact events</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>4.1 What was the species of animal</p>
                            <input type="text" name="animal_species">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="checkbox" id="Dog1">
                                <label for="Dog1">Dog</label>
                            </p>
                        </td>
                        <td colspan="5">
                            <p>
                                <input type="checkbox" id="Cat1">
                                <label for="Cat1">Cat</label>
                            </p>
                        </td>
                        <td colspan="5">
                            <p>
                                <input type="checkbox" id="Cattle1">
                                <label for="Cattle1">Cattle</label>
                            </p>
                        </td>
                        <td colspan="11">
                            <p>
                                <input type="checkbox" id="Buffalo1">
                                <label for="Buffalo1">Buffalo</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="checkbox" id="Other1">
                                <label for="Other1">Other (Specify)</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p><input type="text"></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>4.2 Type of animal</p>
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="Owned-by-deceased1">
                                <label for="Owned-by-deceased1">Owned by deceased</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input type="checkbox" id="Owned-by-Neighbours1">
                                <label for="Owned-by-Neighbours1">Owned by Neighbours</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input type="checkbox" id="Street-Animal1">
                                <label for="Street-Animal1">Street Animal</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="checkbox" id="Wild-animal1">
                                <label for="Wild-animal1">Wild animal</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="checkbox" id="Unknown2">
                                <label for="Unknown2">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="30">
                            <p>4.3 On what date did deceased / suspected patient have contact with this animal?</p>
                        </td>
                        <td colspan="8">
                            <p>(Date)</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            <p>4.4 Place of exposure?</p>
                            <input type="text">
                        </td>
                        <td colspan="28">
                            <input type="text" placeholder="Address">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>4.5 Location of bite/ scratch on body? [select all that apply]</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>
                                <input type="checkbox" id="HeadNeck1">
                                <label for="HeadNeck1">Head/Neck</label>
                            </p>
                        </td>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" id="Trunk1">
                                <label for="Trunk1">Trunk</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="checkbox" id="UpperLimb1">
                                <label for="UpperLimb1">Upper Limb</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="checkbox" id="Hands1">
                                <label for="Hands1">Hands</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input type="checkbox" id="LowerLimb1">
                                <label for="LowerLimb1">Lower Limb</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="Genitalia1">
                                <label for="Genitalia1">Genitalia</label>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- ************************************************************************ -->
        <div class="container bg-light mb-4">
            <table>
                <tbody>
                    <tr>
                        <td colspan="6">
                            <p>4.5.2 Describe of wound:&nbsp; Number of Wounds and their Anatomical Location, Shape and
                                dimensions of Ech wound:</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <table class="table_4_5_2">
                                <tbody>
                                    <tr>
                                        <th>
                                            <p>
                                                <strong>Wound no</strong>
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                                <strong>Anatomical Location</strong>
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                                <strong>Shape</strong>
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                                <strong>Dimensions in cm</strong>
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                                <strong>Action</strong>
                                            </p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                <strong>1</strong>
                                            </p>
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td >
                                           

                                        </td>
                                    </tr>
                                   
                                  
                                </tbody>

                                <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore()">Add More</a>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>4.6 Did the animal show any signs of disease (describe)?</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="AggressionBiting1">
                                <label for="AggressionBiting1">Aggression/Biting</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="checkbox" id="Paralysis1">
                                <label for="Paralysis1">Paralysis</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="AbnormalVocalization1">
                                <label for="AbnormalVocalization1">Abnormal Vocalization</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="checkbox" id="Hypersalivation1">
                                <label for="Hypersalivation1">Hypersalivation</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="Lethargy1">
                                <label for="Lethargy1">Lethargy</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="Other1">
                                <label for="Other1">Other</label>
                            </p>
                        </td>
                        <td colspan="2" class="bggrey">
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>4.7 Did the animal die in the 10 days following the exposure?</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" id="Died1">
                                <label for="Died1">Yes, died</label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" id="WasKilled1">
                                <label for="WasKilled1">Yes, was killed</label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" id="StillAlive1">
                                <label for="StillAlive1">No, still alive</label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" id="DiedLater1">
                                <label for="DiedLater1">No, but died later</label>
                            </p>
                        </td>
                        <td class="bggrey">
                            <input type="date">

                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" id="animal_die_exposure_Unknown1">
                                <label for="animal_die_exposure_Unknown1">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>4.8 Was the animal tested for Rabies?</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_tested_rabies" id="RabiesPositive1">
                                <label for="RabiesPositive1">Yes, Rabies Positive</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_tested_rabies" id="RabiesNegative1">
                                <label for="RabiesNegative1">Yes, Rabies Negative</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="animal_tested_rabies" id="NotTested1">
                                <label for="NotTested1">No</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="animal_tested_rabies" id="RabiesUnknown1">
                                <label for="RabiesUnknown1">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>4.9 Was the animal vaccinated?</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_vaccinated" id="VaccinatedYes1">
                                <label for="VaccinatedYes1">Yes</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_vaccinated" id="VaccinatedNo1">
                                <label for="VaccinatedNo1">No</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_vaccinated" id="VaccinatedUnknown1">
                                <label for="VaccinatedUnknown1">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>NOTE:</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="bglightBlue">
                            <p>
                                <strong>5. Details on Animal Bite Management</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>5.1 Was any of this treatment applied at home?</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="WoundWashingWater1">
                                <label for="WoundWashingWater1">Wound washing with water</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="WoundWashingSoapWater1">
                                <label for="WoundWashingSoapWater1">Wound washing with soap and water</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="WoundCleaningAntiseptic1">
                                <label for="WoundCleaningAntiseptic1">Wound cleaning with antiseptic lotion</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="Bandaging1">
                                <label for="Bandaging1">Bandaging</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="NotKnown1">
                                <label for="NotKnown1">Not known</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" id="OtherTreatment1">
                                <label for="OtherTreatment1">Any other treatment</label> <input type="text">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>5.2.1 Were sutures applied to the animal bite wound?</p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="SuturesApplied" id="SuturesAppliedYes1">
                                <label for="SuturesAppliedYes1">Yes</label>&nbsp;&nbsp;
                                <input type="radio" name="SuturesApplied" id="SuturesAppliedNo1">
                                <label for="SuturesAppliedNo1">No</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>Reason for Suturing</p>
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>5.2.2 If yes when sutures were applied? With 72 Hrs of RIG Infiltration</p>
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>5.3 Did the deceased / suspected patient received Rabies Vaccine&nbsp;&nbsp;
                                <input type="radio" name="rabiesVaccineRecieved" id="RabiesVaccineReceivedYes">
                                <label for="RabiesVaccineReceivedYes">Yes</label>&nbsp;&nbsp;
                                <input type="radio" name="rabiesVaccineRecieved" id="RabiesVaccineReceivedNo1">
                                <label for="RabiesVaccineReceivedNo1">No</label>&nbsp;&nbsp;
                                <input type="radio" name="rabiesVaccineRecieved" id="RabiesVaccineReceivedUnknown1">
                                <label for="RabiesVaccineReceivedUnknown1">Unknown</label>
                            </p>
                            <p>&nbsp;</p>
                            <p>
                                <strong>If Yes,</strong>
                                Number of doses received
                            </p>
                            <p> <label for="RabiesVaccineReceivedYes1"  >1</label>
                                <input type="radio" name="RabiesVaccineReceivedYes" class = "ml-2" id="RabiesVaccineReceivedYes1">  
                                <label for="RabiesVaccineReceivedYes2" > 2</label>
                                <input type="radio" name="RabiesVaccineReceivedYes" class = "ml-2" id="RabiesVaccineReceivedYes2"> 
                                 <label for="RabiesVaccineReceivedYes3" > 3</label> 
                                <input type="radio" name="RabiesVaccineReceivedYes" class = "ml-2" id="RabiesVaccineReceivedYes3"> 
                                 <label for="RabiesVaccineReceivedYes4" > 4</label> 
                                <input type="radio" name="RabiesVaccineReceivedYes" class = "ml-2" id="RabiesVaccineReceivedYes4"> 
                                 <label for="RabiesVaccineReceivedYes5" > 5</label> 
                                <input type="radio" name="RabiesVaccineReceivedYes" class = "ml-2" id="RabiesVaccineReceivedYes5"> 
                                <label for="RabiesVaccineReceivedUnknown2">Unknown</label>
                                <input type="radio" name="RabiesVaccineReceivedYes" class = "ml-2" id="RabiesVaccineReceivedUnknown2"> 
                            </p>
                            <p>&nbsp;</p>
                            <p>Details of Rabies vaccine received</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <table class="table_5_3">
                                <tbody>
                                    <tr>
                                        <th>
                                            <p>Dose No</p>
                                        </th>
                                        <th>
                                            <p>Date of vaccine administration</p>
                                        </th>
                                        <th>
                                            <p>Route of vaccine administration</p>
                                        </th>
                                        <th>
                                            <p>Site of vaccine administration</p>
                                        </th>
                                        <th>
                                            <p>Brand Name of Vaccine</p>
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                           1
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td>
                                            <input type="text">
                                        </td>
                                        <td></td>
                                    </tr>
                                   
                                   
                                </tbody>
                                <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore2()">Add More</a>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>
                                5.4  <b> If Incomplete PEP,</b> reason:
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><input type="checkbox"> Animal well after observation period</p>
                        </td>
                        <td colspan="2">
                            <p><input type="checkbox"> Animal results negative</p>
                        </td>
                        <td colspan="2">
                            <p><input type="checkbox"> Specify if other:</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><input type="checkbox"> Victim previously immunized</p>
                        </td>
                        <td colspan="2">
                            <p><input type="checkbox"> Victim refused further doses</p>
                        </td>
                        <td colspan="2" class="bggrey" rowspan="2" class="bggrey">
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><input type="checkbox"> Lost to follow-up</p>
                        </td>
                        <td colspan="4">
                            <p><input type="checkbox"> Referred out of jurisdiction</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>5.5 Rabies Immunoglobulin (RIG) (or RmAb) received?</p>
                        </td>
                        <td colspan="4">
                            <p><input type="radio" name="rabies_immunoglobulin" id="rabies_immunoglobulin1"> <label for="rabies_immunoglobulin1">Yes</label> <input type="radio" name="rabies_immunoglobulin" class="ml-2" id="rabies_immunoglobulin2"> <label for="rabies_immunoglobulin2">No</label></p>
                        </td>
                    </tr>
                    <!-- ***** ***********************************************************-->
                    <tr>
                        <td colspan="1" rowspan="2">
                            <p>
                                <strong>If yes</strong>,
                            </p>
                        </td>
                        <td colspan="1">
                            <p>Brand Name:</p>
                        </td>
                        <td colspan="2">
                            <p>Date of RIG administration:</p>
                        </td>
                        <td colspan="2" rowspan="2">
                            <p>Site:
                                <input type="radio" name="rabies_immunoglobulin_site" id="IntoWound1">
                                <label for="IntoWound1">Into wound</label>
                                <input type="radio" name="rabies_immunoglobulin_site" id="IM1">
                                <label for="IM1">IM (not recommended)</label>
                                <input type="radio" name="rabies_immunoglobulin_site" id="Both1">
                                <label for="Both1">both</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="bggrey">
                            <input type="text">
                        </td>
                        <td colspan="2" class="bggrey">
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>5.6 Had the patient ever been vaccinated against rabies prior to this exposure?</p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="vaccinated_against_rabies" id="vaccinated_against_rabies_yes">
                                <label for="vaccinated_against_rabies_yes">Yes</label> Year & number of doses:
                            </p>
                        </td>
                        <td colspan="2" class="bggrey" class="bggrey">
                            <input type="text">
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="vaccinated_against_rabies" id="vaccinated_against_rabies_no">
                                <label for="vaccinated_against_rabies_no">No</label>
                                <br>
                                <input type="radio" name="vaccinated_against_rabies" id="vaccinated_against_rabies_unknown" class="ml-2">
                                <label for="vaccinated_against_rabies_unknown">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p>5.7 Had the patient received TT vaccine post exposure</p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="TT_vaccine" id="TTRcvdYes1">
                                <label for="TTRcvdYes1">Yes</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="TT_vaccine" id="TTRcvdNo1">
                                <label for="TTRcvdNo1">No</label>
                            </p>
                        </td>
                    </tr>
            </table>
        </div>
        <!-- **************************************************first***********************************  -->
       
        <div class="container bg-light mb-4">
            <table >
                <thead>
                    <tr>
                        <td colspan="4" class="bglightBlue">
                            <p>
                                <strong>6. Signs and Symptoms related to Rabies</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>6.1 Symptoms exhibited by deceased/ suspected patient</p>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2" class="w-50 table2 p-0">
                            <table>
                                <thead>
                                    <th>
                                        <p>
                                            <strong>Symptom</strong>
                                        </p>
                                    </th>
                                    <th>
                                        <p>
                                            <strong>Yes</strong>
                                        </p>
                                    </th>
                                    <th>
                                        <p>
                                            <strong>No</strong>
                                        </p>
                                    </th>
                                    <th>
                                        <p>
                                            <strong>Unknown</strong>
                                        </p>
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Fever</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="fever">
                                        </td>
                                        <td>
                                            <input type="radio" name="fever">
                                        </td>
                                        <td>
                                            <input type="radio" name="fever">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Headache</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="headache">
                                        </td>
                                        <td>
                                            <input type="radio" name="headache">
                                        </td>
                                        <td>
                                            <input type="radio" name="headache">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Vomiting</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="vomiting">
                                        </td>
                                        <td>
                                            <input type="radio" name="vomiting">
                                        </td>
                                        <td>
                                            <input type="radio" name="vomiting">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Muscle spasm</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="muscle_spasm">
                                        </td>
                                        <td>
                                            <input type="radio" name="muscle_spasm">
                                        </td>
                                        <td>
                                            <input type="radio" name="muscle_spasm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Anorexia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="anorexia">
                                        </td>
                                        <td>
                                            <input type="radio" name="anorexia">
                                        </td>
                                        <td>
                                            <input type="radio" name="anorexia">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Priapism</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="priapism">
                                        </td>
                                        <td>
                                            <input type="radio" name="priapism">
                                        </td>
                                        <td>
                                            <input type="radio" name="priapism">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Aerophobia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="aerophobia">
                                        </td>
                                        <td>
                                            <input type="radio" name="aerophobia">
                                        </td>
                                        <td>
                                            <input type="radio" name="aerophobia">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Localized weakness</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_weakness">
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_weakness">
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_weakness">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Confusion</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="confusion">
                                        </td>
                                        <td>
                                            <input type="radio" name="confusion">
                                        </td>
                                        <td>
                                            <input type="radio" name="confusion">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Agitation</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="agitation">
                                        </td>
                                        <td>
                                            <input type="radio" name="agitation">
                                        </td>
                                        <td>
                                            <input type="radio" name="agitation">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Autonomic instability</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="autonomic_instability">
                                        </td>
                                        <td>
                                            <input type="radio" name="autonomic_instability">
                                        </td>
                                        <td>
                                            <input type="radio" name="autonomic_instability">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Insomnia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="insomnia">
                                        </td>
                                        <td>
                                            <input type="radio" name="insomnia">
                                        </td>
                                        <td>
                                            <input type="radio" name="insomnia">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan="2" class="w-50 table2 p-0">
                            <table>
                                <thead>
                                    <th>
                                        <p>
                                            <strong>Symptom</strong>
                                        </p>
                                    </th>
                                    <th>
                                        <p>
                                            <strong>Yes</strong>
                                        </p>
                                    </th>
                                    <th>
                                        <p>
                                            <strong>No</strong>
                                        </p>
                                    </th>
                                    <th>
                                        <p>
                                            <strong>Unknown</strong>
                                        </p>
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Malaise</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="malaise">
                                        </td>
                                        <td>
                                            <input type="radio" name="malaise">
                                        </td>
                                        <td>
                                            <input type="radio" name="malaise">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Nausea</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="nausea">
                                        </td>
                                        <td>
                                            <input type="radio" name="nausea">
                                        </td>
                                        <td>
                                            <input type="radio" name="nausea">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Anxiety</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="anxiety">
                                        </td>
                                        <td>
                                            <input type="radio" name="anxiety">
                                        </td>
                                        <td>
                                            <input type="radio" name="anxiety">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Dysphasia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="dysphasia">
                                        </td>
                                        <td>
                                            <input type="radio" name="dysphasia">
                                        </td>
                                        <td>
                                            <input type="radio" name="dysphasia">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Ataxia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="ataxia">
                                        </td>
                                        <td>
                                            <input type="radio" name="ataxia">
                                        </td>
                                        <td>
                                            <input type="radio" name="ataxia">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Seizures</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="seizures">
                                        </td>
                                        <td>
                                            <input type="radio" name="seizures">
                                        </td>
                                        <td>
                                            <input type="radio" name="seizures">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Hydrophobia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="hydrophobia">
                                        </td>
                                        <td>
                                            <input type="radio" name="hydrophobia">
                                        </td>
                                        <td>
                                            <input type="radio" name="hydrophobia">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Localized pain</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_pain">
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_pain">
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_pain">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Delirium</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="delirium">
                                        </td>
                                        <td>
                                            <input type="radio" name="delirium">
                                        </td>
                                        <td>
                                            <input type="radio" name="delirium">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Aggressiveness</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="aggressiveness">
                                        </td>
                                        <td>
                                            <input type="radio" name="aggressiveness">
                                        </td>
                                        <td>
                                            <input type="radio" name="aggressiveness">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Hyperactivity</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="hyperactivity">
                                        </td>
                                        <td>
                                            <input type="radio" name="hyperactivity">
                                        </td>
                                        <td>
                                            <input type="radio" name="hyperactivity">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Hypersalivation Any other:</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="hypersalivation">
                                        </td>
                                        <td>
                                            <input type="radio" name="hypersalivation">
                                        </td>
                                        <td>
                                            <input type="radio" name="hypersalivation">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <!-- ****************************** -->
                    <tr>
                        <td colspan="1">
                            <p>6.2 Date of onset of symptoms or approximate length of illness:</p>
                        </td>
                        <td colspan="3" class="bggrey">
                            <input type="date">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>6.3 Date of death</p>
                        </td>
                        <td colspan="1" class="bggrey">
                            <input type="date">
                        </td>
                        <td colspan="1">
                            <p><input type="checkbox"> Alive</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>
                                6.4
                                <strong>If deceased,</strong>
                                where did deceased die
                            </p>
                        </td>
                        <td colspan="3">

                            <p>
                                <label for="deceased_die">Home</label>
                                <input type="radio" name="deceased_die" id="deceased_die">
                                 <label for="deceased_die_health_facility">Health facility</label>
                                <input type="radio" name="deceased_die" id="deceased_die_health_facility">
                                
                                <input type="text" class="mr-2" name="deceased_die_health_facility_input" id="deceased_die_health_facility_input">

                                 <label for="deceased_die_other">Other</label><input type="radio" name="deceased_die" id="deceased_die_other"> <input type="text" name="deceased_die_other_input" id="deceased_die_other_input"></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>6.5 During the illness did the deceased/ suspected patient seek medical help?</p>
                        </td>
                        <td colspan="2">
                            <p><input type="radio" name="medical_help" id="medical_help_yes">
                            <label for="medical_help_yes">Yes</label>
                                 
                                <input type="radio" name="medical_help" id="medical_help_no">
                                <label for="medical_help_no">No</label>
                                 
                                <input type="radio" name="medical_help" id="medical_help_unknown"> 
                                <label for="medical_help_unknown">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                6.6
                                <strong>If Yes,</strong>
                                please share details of health facilities
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>Name of Hospital/ Health facility (City/Village)</p>
                        </td>
                        <td colspan="1" class="bggrey">
                            <p>HF 1</p>
                        </td>
                        <td colspan="1" class="bggrey">
                            <p>HF2</p>
                        </td>
                        <td colspan="1" class="bggrey">
                            <p>HF3</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>Date of consultation</p>
                        </td>
                        <td colspan="1" class="bggrey">
                            <input type="date">
                        </td>
                        <td colspan="1" class="bggrey">
                            <input type="date">
                        </td>
                        <td colspan="1" class="bggrey">
                            <input type="date">
                        </td>
                    </tr>
                    <!-- *************************************** -->
                    <tr>
                        <td colspan="4">
                            <p> 6.7 Was any Laboratory specific test (ELISA/PCR/FAT) performed for lab confirmation of human
                                Rabies?</p>
                            <table class="table3 table_6_7">
                                <thead>
                                    <tr>
                                        <th>
                                            Sr. No.
                                        </th>
                                        <th>
                                            <p>
                                               Test performed
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                               Hospital/Lab.
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                               Date
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                               Result
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                               Comment
                                            </p>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td >
                                            <input type="text">
                                        </td>
                                        <td >
                                            <input type="text">
                                        </td>
                                        <td >
                                            <input type="text">
                                        </td>
                                        <td >
                                            <input type="text">
                                        </td>
                                        <td >
                                            <input type="text">
                                        </td>
                                        <td></td>
                                    </tr>
                                 
                              
                                </tbody>
                                <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore3()">Add More</a>
                            </table>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="4">
                            <p>
                                6.8 MRI brain done? &nbsp;
                                <label for="MRI_brain_done_yes">Yes</label>
                               
                                <input type="radio" name="MRI_brain_done" id="MRI_brain_done_yes">
                                <label for="MRI_brain_done_no">No</label>
                                <input type="radio" name="MRI_brain_done" id="MRI_brain_done_no"> &nbsp;if yes write significant finding
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4">
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="bglightBlue">
                            <p>
                                <strong>7. Post-mortem information</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.1 Postmortem done: &nbsp;
                                <label for="postmortem_yes">Yes</label>
                                <input type="radio" name="postmortem" id="postmortem_yes">
                                
                                <label for="postmortem_no">No</label>
                                <input type="radio" name="postmortem" id="postmortem_no">
                                
                                <label for="postmortem_unknown">unknown</label>
                                <input type="radio" name="postmortem" id="postmortem_unknown"> </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                <strong>If Yes,</strong>
                                Copy of report
                                available ? &nbsp;
                                <label for="copy_of_report_yes">Yes</label>
                                <input type="radio" name="copy_of_report" id="copy_of_report_yes">
                                <label for="copy_of_report_no">No</label>
                                <input type="radio" name="copy_of_report" id="copy_of_report_no">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.1.1 Did deceased have any evidence of recent wounds? &nbsp;<input type="checkbox">
                                Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox"> No</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.1.2 Did deceased have any evidence of healed wounds? &nbsp;&nbsp;<input type="checkbox">
                                Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox"> No</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.2 Death certificate
                                available:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox">
                                Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox">
                                No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox"> Unknown</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>If yes, cause of death mentioned:</p>
                        </td>
                        <td colspan="3" class="bggrey">
                            <input type="text">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="bglightBlue">
                            <p>
                                <strong>8. Contact tracking</strong>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>8.1 Did anyone else in the community develop an illness similar to the deceased/ suspected
                                patient within the past 12 months? 
                                <label for="contact_tracking_yes">Yes</label>
                                <input type="radio" name="contact_tracking" id="contact_tracking_yes">
                                <label for="contact_tracking_no">No</label>
                                <input type="radio" name="contact_tracking" id="contact_tracking_no">
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
        <!-- **************************************************** -->
        <!-- **************************************************************** -->
        <div class="container bg-light mb-4">
            <table>
                <tbody>
                    <tr>
                        <td colspan="1">
                            <p>
                                <strong>If yes</strong>
                                , Details of person to initiate verbal autopsy of additional cases:
                            </p>
                        </td>
                        <td colspan="2" class="bggrey">
                            <input type="text">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p style="display: block;">
                                8.2 Collect the names and contact information for any person below who had <b>close contact
                                    with the suspected rabies case in the last 14 days of onset of symptoms</b>. ( <em>Close
                                    contacts were likely to have had their hands or open cuts, wounds, or mucous membranes
                                    in contact with a patient&#39;s saliva,respiratory secretions, autopsy material, or
                                    other potentially infectious material</em>)
                            </p>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <p>Contact</p>
                                        </td>
                                        <td>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Family</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Community</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Hospital workers</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Any Other</p>
                                        </td>
                                        <td>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Family</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Community</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Hospital workers</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Any Other</p>
                                        </td>
                                        <td>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Family</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Community</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Hospital workers</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Any Other</p>
                                        </td>
                                        <td>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Family</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Community</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Hospital workers</p>
                                            <p><input type="checkbox">&nbsp;&nbsp;&nbsp; Any Other</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>Name</p>
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Address</p>
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Contact</p>
                                            <p>Number</p>
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                        <td class="bggrey">
                                            <input type="text">
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p style="display: block;">
                                8.3 Collect the names and contact information for any people who<b>had contact with the
                                    animal suspected of transmitting rabies to the case</b> . Including details of animal
                                owners.
                            </p>
                            <p>Risk assessments should be conducted with these people to rule out potential exposure.</p>
                            <table class="table3 table_8_3" id="table_8_3">
                            <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore4()">Add More</a>
                                <thead >
                                    <tr>
                                        <th>
                                             Sr. No.
                                        </th>
                                        <th>
                                            <p>
                                                <strong>Name and Address</strong>
                                            </p>
                                        </th>
                                        <th>
                                            <p>
                                                <strong>Relation</strong>
                                            </p>
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>
                                            <p>1</p>
                                        </td>
                                        <td >
                                            <input type="text">
                                        </td>
                                        <td >
                                            <input type="text">
                                        </td>
                                    </tr>
                                    

                                </tbody>
                               
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <div>
                                <p>&nbsp;</p>
                                <p class="bglightBlue">
                                    <strong>9. Final Impression/ report:</strong>
                                </p>
                                <p>
                                    <strong>Is it a Probable Rabies Case? &nbsp; </strong>
                                    <label for="probable_rabies_yes">Yes</label>
                                    <input type="radio" name="probable_rabies" id="probable_rabies_yes">
                                    <label for="probable_rabies_no">No</label>
                                    <input type="radio" name="probable_rabies" id="probable_rabies_no">
                                </p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- ****************************************************** -->
        <div class="d-flex justify-content-center">  <button class="btn btn-primary">Save</button> </div>
    </div>
   
  </form>
@endsection
