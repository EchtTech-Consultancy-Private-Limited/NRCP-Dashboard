@extends('layouts.main')
@section('title')
    {{ 'Investigate Report Edit' }}
@endsection
@section('content')
  <form action="{{ route('national.investigate-report-update', $investigateReport->id) }}" method="post">
    @csrf
    <div class="dashboard">
        <div class="form-tab">
        <div class="dashboard-filter mb-4">
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
                        <td colspan="18" class="">
                            <input type="text" name="interviewer_name" value="{{ old('interviewer_name', $investigateReport->interviewer_name) }}">
                            @if ($errors->has('interviewer_name'))
                                <span class="form-text text-muted">{{ $errors->first('interviewer_name') }}</span>
                            @endif
                        </td>
                        <td colspan="10">
                            <p>Date of Interview</p>
                        </td>
                        <td colspan="5" class="">
                            <input name="interview_date" value="{{ old('interview_date', $investigateReport->interview_date) }}" type="date">
                            @if ($errors->has('interview_date'))
                                <span class="form-text text-muted">{{ $errors->first('interview_date') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p>Designation</p>
                        </td>
                        <td colspan="18" class="">
                            <input name="interviewer_designation" value="{{ old('interviewer_designation', $investigateReport->interviewer_designation) }}" type="text">
                            @if ($errors->has('interviewer_designation'))
                                <span class="form-text text-muted">{{ $errors->first('interviewer_designation') }}</span>
                            @endif
                        </td>
                        <td colspan="10">
                            <p>Contact number</p>
                        </td>
                        <td colspan="5" class="">
                            <input name="interviewer_contact_number" value="{{ old('interviewer_contact_number', $investigateReport->interviewer_contact_number) }}" type="text" oninput="validateInput(this)" maxlength="12">
                            @if ($errors->has('interviewer_contact_number'))
                                <span class="form-text text-muted">{{ $errors->first('interviewer_contact_number') }}</span>
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
                        <td colspan="15" class="">
                            <input name="suspected_name" type="text" value="{{ old('suspected_name', $investigateReport->suspected_name) }}">
                        </td>
                        <td colspan="4">
                            <p>&nbsp;Sex</p>
                        </td>
                        <td colspan="9" class="">
                            <select class="form-select" name="suspected_gender" aria-label="Default select example" id="gender">
                                <option value=""> Select Gender</option> 
                                @if(old('suspected_gender')) 
                                <option value="{{ old('suspected_gender') }}" selected>{{ old('suspected_gender') }}</option> 
                                @endif 
                                <option value="Male" {{($investigateReport->suspected_gender == 'Male' ? 'selected' : '' )}}> Male</option>
                                <option value="Famale" {{($investigateReport->suspected_gender == 'Famale' ? 'selected' : '' )}}> Famale</option>
                                <option value="Other" {{($investigateReport->suspected_gender == 'Other' ? 'selected' : '' )}}> Other</option>
                              </select>
                            @if ($errors->has('suspected_gender')) <span class="form-text text-muted">{{ $errors->first('suspected_gender') }}</span> @endif
                        </td>
                        <td colspan="7">
                            <p>&nbsp;Age</p>
                        </td>
                        <td class="">
                            <input type="text" name="suspect_age" value="{{ old('suspect_age', $investigateReport->suspect_age) }}" maxlength="2" oninput="validateInput(this)">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>Occupation</p>
                        </td>
                        <td colspan="11" class="">
                            <input type="text" name="suspect_occupation" value="{{ old('suspect_occupation', $investigateReport->suspect_occupation) }}">
                        </td>
                        <td colspan="4">
                            <p>Address</p>
                        </td>
                        <td colspan="21" class="">
                            <input name="suspect_address" type="text" value="{{ old('suspect_address', $investigateReport->suspect_address) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>Level of education</p>
                        </td>
                        {{-- <td colspan="10">
                            <input type="text" name="suspect_education[level1]" value="{{ old('suspect_education')['level1'] ?? '' ?? '' }}">
                        </td>
                        <td colspan="13">
                            <input type="text" name="suspect_education[level2]" value="{{ old('suspect_education')['level2'] ?? '' ?? '' }}">
                        </td> --}}
                        <td colspan="40">
                            {{-- <input type="text" name="suspect_education[level3]" value="{{ old('suspect_education')['level3'] ?? '' ?? '' }}"> --}}
                        </td>
                    </tr>
                    <tr> 
                        <td colspan="7">
                            <p> 
                                <input type="radio" id="Illiterate" name="suspect_education[education]" value="Illiterate" {{ old('suspect_education.education', old('suspect_education.education', @$investigateReport->suspect_education['education'])) == 'Illiterate' ? 'checked' : '' }}>
                                <label for="Illiterate">Illiterate</label>
                            </p>
                        </td>
                        <td colspan="15">
                            <p>
                                <input type="radio" id="PrimarySchool" name="suspect_education[education]" value="Primary School" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Primary School' ? 'checked' : '' }}>
                                <label for="PrimarySchool">Primary School</label>
                            </p>
                        </td>
                        <td colspan="9">
                            <p>
                                <input type="radio" id="Graduate" name="suspect_education[education]" value="Graduate" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Graduate' ? 'checked' : '' }}>
                                <label for="Graduate">Graduate</label>
                            </p>
                        </td>
                        <td colspan="7">
                            <p>
                                <input type="radio" id="ProfessionalDegree" name="suspect_education[education]" value="Professional Degree" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Professional Degree' ? 'checked' : '' }}>
                                <label for="ProfessionalDegree">Professional Degree</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>
                                <input type="radio" id="BelowPrimary" name="suspect_education[education]" value="Below Primary" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Below Primary' ? 'checked' : '' }}>
                                <label for="BelowPrimary">Below Primary</label>
                            </p>
                        </td>
                        <td colspan="15">
                            <p>
                                <input type="radio" id="SecondarySchool" name="suspect_education[education]" value="Secondary School" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Secondary School' ? 'checked' : '' }}>
                                <label for="SecondarySchool">Secondary School</label>
                            </p>
                        </td>
                        <td colspan="9">
                            <p>
                                <input type="radio" id="Postgraduate" name="suspect_education[education]" value="Postgraduate" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Postgraduate' ? 'checked' : '' }}>
                                <label for="Postgraduate">Postgraduate</label>
                            </p>
                        </td>
                        <td colspan="7">
                            <p>
                                <input type="radio" id="Unknown" name="suspect_education[education]" value="Unknown" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Unknown' ? 'checked' : '' }}>
                                <label for="Unknown">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">
                            <p>
                                <input type="radio" name="suspect_education[education]" value="Other(Specify)" {{ old('suspect_education.education', @$investigateReport->suspect_education['education']) == 'Other(Specify)' ? 'checked' : '' }}>
                                <label for="Other(Specify)">Other (Specify)</label>
                            </p>
                        </td>
                        <td colspan="31" class="">
                            <input type="text" name="suspect_education[other_specify_text]" value="{{ old('suspect_education.other_specify_text', @$investigateReport->suspect_education['other_specify_text']) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>Is/was patient immunocompromised? (if yes, provide details) 
                                <input type="text" name="suspect_education[details]" value="{{ old('suspect_education.details', @$investigateReport->suspect_education['details']) }}"></p>
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
                            <input type="text" name="respondent_name" value="{{ old('respondent_name',$investigateReport->respondent_name) }}">
                        </td>
                        <td colspan="10">
                            <p>Age of respondent</p>
                        </td>
                        <td colspan="11">
                            <input type="text" name="respondent_age" value="{{ old('respondent_age',$investigateReport->respondent_age) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            <p>Contact number</p>
                        </td>
                        <td colspan="12">
                            <input type="text" name="respondent_contact" value="{{ old('respondent_contact',$investigateReport->respondent_contact) }}">
                        </td>
                        <td colspan="10">
                            <p>Address (if different from patient)</p>
                        </td>
                        <td colspan="11">
                            <input type="text" name="respondent_address" value="{{ old('respondent_address',$investigateReport->respondent_address) }}">
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
                                <input name="relationship_with_suspect" type="radio" id="Parent1" value="Parent" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Parent' ? 'checked' : '' }}>
                                <label for="Parent1">Parent</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Sibling1" value="Sibling" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Sibling' ? 'checked' : '' }}>
                                <label for="Sibling1">Sibling</label>
                            </p>
                        </td>
                        <td colspan="13">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Parent-in-law1" value="Parent-in-law" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Parent-in-law' ? 'checked' : '' }} >
                                <label for="Parent-in-law1">Parent-in-law</label>
                            </p>
                        </td>
                        <td colspan="11">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Community-leader1" value="Community-leader" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Community-leader' ? 'checked' : '' }}>
                                <label for="Community-leader1">Community leader</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Husband-wife1" value="Husband-wife" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Husband-wife' ? 'checked' : '' }}>
                                <label for="Husband-wife1">Husband/wife</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Child1" value="Child" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Child' ? 'checked' : '' }}>
                                <label for="Child1">Child</label>
                            </p>
                        </td>
                        <td colspan="13">
                            <p>
                                <input name="relationship_with_suspect" type="radio" id="Friend-neighbour1" value="Friend-neighbour" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Friend-neighbour' ? 'checked' : '' }}>
                                <label for="Friend-neighbour1">Friend or neighbour</label>
                            </p>
                        </td>
                        <td colspan="11">
                            <p>
                                <input type="radio" name="relationship_with_suspect" id="Son-in-law-daughter-in-law1" value="Son-in-law/daughter-in-law" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Son-in-law/daughter-in-law' ? 'checked' : '' }}>
                                <label for="Son-in-law-daughter-in-law1">Son-in-law/daughter-in-law</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="14">
                            <p>
                                <input type="radio" name="relationship_with_suspect" id="Health-care-worker1" value="Health care worker (facility name)" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Health care worker (facility name)' ? 'checked' : '' }}>
                                <label for="Health-care-worker1">Health care worker (facility name):</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <input type="text" name="healthcare_worker_facility_name" value="{{ old('healthcare_worker_facility_name') }}" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Health care worker (facility name)' ? 'style=display:block' : '' }}>
                        </td>
                        <td colspan="11">
                            <p>
                                <input type="radio" id="Other1" name="relationship_with_suspect" value="Other(specify)" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Other(specify)' ? 'checked' : '' }}>
                                <label for="Other1">Other(specify):</label>
                            </p>
                        </td>
                        <td colspan="5">
                            <input type="text" name="specify_other_name" value="{{ old('specify_other_name') }}" {{ old('relationship_with_suspect',$investigateReport->relationship_with_suspect) == 'Other(specify)' ? 'style=display:block' : '' }}>
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
                                <input type="radio" id="CategoryI1" name="suspect_contact_with_animals" value="category1" {{ old('suspect_contact_with_animals',$investigateReport->suspect_contact_with_animals) == 'category1' ? 'checked' : '' }}>
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
                                <input type="radio" id="CategoryII1" name="suspect_contact_with_animals" value="category2" {{ old('suspect_contact_with_animals',$investigateReport->suspect_contact_with_animals) == 'category2' ? 'checked' : '' }}>
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
                                <input type="radio" id="CategoryIII1" name="suspect_contact_with_animals" value="category3" {{ old('suspect_contact_with_animals',$investigateReport->suspect_contact_with_animals) == 'category3' ? 'checked' : '' }}>
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
                                <input type="radio" id="No1" name="suspect_contact_with_animals" value="No" {{ old('suspect_contact_with_animals',$investigateReport->suspect_contact_with_animals) == 'No' ? 'checked' : '' }}>
                                <label for="No1">No</label>
                            </p>
                        </td>
                        <td colspan="21">
                            <p>
                                <input type="radio" id="Unknown1" name="suspect_contact_with_animals" value="Unknown" {{ old('suspect_contact_with_animals',$investigateReport->suspect_contact_with_animals) == 'Unknown' ? 'checked' : '' }}>
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
                            <input type="text" name="animal_species[text]" value="{{ old('animal_species.text', $investigateReport->animal_species['text']) }}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>
                                <input type="radio" class="animalsingleselect" value="Dog" name="animal_species[animals]" {{ old('animal_species.animals', @$investigateReport->animal_species['animals']) == 'Dog' ? 'checked' : '' }}>
                                <label for="Dog1">Dog</label>
                            </p>
                        </td>
                        <td colspan="5">
                            <p>
                                <input type="radio" class="animalsingleselect" value="Cat" name="animal_species[animals]" {{ old('animal_species.animals', @$investigateReport->animal_species['animals']) == 'Cat' ? 'checked' : '' }}>
                                <label for="Cat1">Cat</label>
                            </p>
                        </td>
                        <td colspan="5">
                            <p>
                                <input type="radio" class="animalsingleselect" value="Cattle" name="animal_species[animals]" {{ old('animal_species.animals', @$investigateReport->animal_species['animals']) == 'Cattle' ? 'checked' : '' }}>
                                <label for="Cattle1">Cattle</label>
                            </p>
                        </td>
                        <td colspan="11">
                            <p>
                                <input type="radio" class="animalsingleselect" value="Buffalo" name="animal_species[animals]" {{ old('animal_species.animals', @$investigateReport->animal_species['animals']) == 'Buffalo' ? 'checked' : '' }}>
                                <label for="Buffalo1">Buffalo</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="radio" class="animalsingleselect" value="Other (Specify)" name="animal_species[animals]" {{ old('animal_species.animals', @$investigateReport->animal_species['animals']) =='Other (Specify)' ? 'checked' : '' }}>
                                <label for="Other1">Other (Specify)</label>
                            </p>
                        </td>
                        <td colspan="8" class="">
                            <p><input type="text" name="animal_species[other_text]" value="{{ old('animal_species.other_text') }}"></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="38">
                            <p>4.2 Type of Animal</p>
                            <input type="text" name="type_of_animal[text]" value="{{ old('type_of_animal.text' , @$investigateReport->type_of_animal['text']) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p> 
                                <input type="radio" name="type_of_animal[animaltype]" id="Owned-by-deceased1" value="Owned by Deceased" {{ old('type_of_animal.animaltype', @$investigateReport->type_of_animal['animaltype']) == 'Owned by Deceased' ? 'checked' : '' }}>
                                <label for="Owned-by-deceased1">Owned by Deceased</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input type="radio" name="type_of_animal[animaltype]" id="Owned-by-Neighbours1" value="Owned by Neighbours" {{ old('type_of_animal.animaltype', @$investigateReport->type_of_animal['animaltype']) == 'Owned by Neighbours' ? 'checked' : '' }}>
                                <label for="Owned-by-Neighbours1">Owned by Neighbours</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input type="radio" name="type_of_animal[animaltype]" id="Street-Animal1" value="Street Animal" {{ old('type_of_animal.animaltype', @$investigateReport->type_of_animal['animaltype']) == 'Street Animal' ? 'checked' : '' }}>
                                <label for="Street-Animal1">Street Animal</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="radio" name="type_of_animal[animaltype]" id="Wild-animal1" value="Wild Animal" {{ old('type_of_animal.animaltype', @$investigateReport->type_of_animal['animaltype']) == 'Wild Animal' ? 'checked' : '' }}>
                                <label for="Wild-animal1">Wild Animal</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="radio" name="type_of_animal[animaltype]" id="Unknown2" value="Unknown" {{ old('type_of_animal.animaltype', @$investigateReport->type_of_animal['animaltype']) == 'Unknown' ? 'checked' : '' }}>
                                <label for="Unknown2">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="30">
                            <p>4.3 On what date did deceased / suspected patient have contact with this animal?</p>
                        </td>
                        <td colspan="8">
                            <input type="date" name="deceased_date" value="{{ old('deceased_date',$investigateReport->deceased_date) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10">
                            <p>4.4 Place of exposure?</p>
                            <input type="text" name="place_of_exposure" value="{{ old('place_of_exposure',$investigateReport->place_of_exposure) }}">
                        </td>
                        <td colspan="28">
                            <input type="text" name="place_of_exposure_address" value="{{ old('place_of_exposure_address',$investigateReport->place_of_exposure_address) }}" placeholder="Address">
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
                                <input type="checkbox" name="location_of_bite[head_neck]" id="HeadNeck1"
                                    {{ old('location_of_bite.head_neck', $investigateReport->location_of_bite['head_neck'] ?? false) ? 'checked' : '' }}>
                                <label for="HeadNeck1">Head/Neck</label>
                            </p>
                        </td>
                        <td colspan="7">
                            <p>
                                <input type="checkbox" name="location_of_bite[trunk]" id="Trunk1"
                                    {{ old('location_of_bite.trunk', $investigateReport->location_of_bite['trunk'] ?? false) ? 'checked' : '' }}>
                                <label for="Trunk1">Trunk</label>
                            </p>
                        </td>                        
                        <td colspan="8">
                            <p>
                                <input type="checkbox" name="location_of_bite[upper_limb]" id="UpperLimb1"
                                       {{ old('location_of_bite.upper_limb', $investigateReport->location_of_bite['upper_limb'] ?? false) ? 'checked' : '' }}>
                                <label for="UpperLimb1">Upper Limb</label>
                            </p>
                        </td>
                        <td colspan="8">
                            <p>
                                <input type="checkbox" name="location_of_bite[hands]" id="Hands1"
                                       {{ old('location_of_bite.hands', $investigateReport->location_of_bite['hands'] ?? false) ? 'checked' : '' }}>
                                <label for="Hands1">Hands</label>
                            </p>
                        </td>
                        <td colspan="10">
                            <p>
                                <input type="checkbox" name="location_of_bite[lower_limb]" id="LowerLimb1"
                                       {{ old('location_of_bite.lower_limb', $investigateReport->location_of_bite['lower_limb'] ?? false) ? 'checked' : '' }}>
                                <label for="LowerLimb1">Lower Limb</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="location_of_bite[genitalia]" id="Genitalia1"
                                       {{ old('location_of_bite.genitalia', $investigateReport->location_of_bite['genitalia'] ?? false) ? 'checked' : '' }}>
                                <label for="Genitalia1">Genitalia</label>
                            </p>
                        </td>
                        
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- ************************************************************************ -->
        <div class="dashboard-filter mb-4">
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
                                    @foreach($investigateReport->number_of_wounds['anatomical_location'] as $index => $anatomicalLocation)
                                    <tr id="row{{ $index + 1 }}">
                                        <td>
                                            <p>
                                                <strong>{{ $index + 1 }}</strong>
                                            </p>
                                        </td>
                                        <td>
                                            <input type="text" name="number_of_wounds[anatomical_location][]" value="{{ $anatomicalLocation }}">
                                        </td>
                                        <td>
                                            <input type="text" name="number_of_wounds[shape][]" value="{{ $investigateReport->number_of_wounds['shape'][$index] ?? old('number_of_wounds.shape.'.$index) }}">
                                        </td>
                                        <td>
                                            <input type="text" name="number_of_wounds[dimensions_in_cm][]" value="{{ $investigateReport->number_of_wounds['dimensions_in_cm'][$index] ?? old('number_of_wounds.dimensions_in_cm.'.$index) }}">
                                        </td>
                                        <td>
                                            @if($anatomicalLocation)
                                                <a role="button" class="btn btn-danger remove-table-row float-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach                                  
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
                                <input type="checkbox" name="sign_of_disease[aggression_biting]" id="AggressionBiting1" {{ old('sign_of_disease.aggression_biting', $investigateReport->sign_of_disease['aggression_biting'] ?? false) ? 'checked' : '' }}>
                                <label for="AggressionBiting1">Aggression/Biting</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="checkbox" name="sign_of_disease[paralysis]" id="Paralysis1" {{ old('sign_of_disease.paralysis', $investigateReport->sign_of_disease['paralysis'] ?? false) ? 'checked' : '' }}>
                                <label for="Paralysis1">Paralysis</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="sign_of_disease[abnormal_vocalization]" id="AbnormalVocalization1" {{ old('sign_of_disease.abnormal_vocalization', $investigateReport->sign_of_disease['abnormal_vocalization'] ?? false) ? 'checked' : '' }}>
                                <label for="AbnormalVocalization1">Abnormal Vocalization</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="checkbox" name="sign_of_disease[hypersalivation]" id="Hypersalivation1" {{ old('sign_of_disease.hypersalivation', $investigateReport->sign_of_disease['hypersalivation'] ?? false) ? 'checked' : '' }}>
                                <label for="Hypersalivation1">Hypersalivation</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="sign_of_disease[lethargy]" id="Lethargy1" {{ old('sign_of_disease.lethargy', $investigateReport->sign_of_disease['lethargy'] ?? false) ? 'checked' : '' }}>
                                <label for="Lethargy1">Lethargy</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="sign_of_disease[other]" id="Other1" {{ old('sign_of_disease.other', $investigateReport->sign_of_disease['other'] ?? false) ? 'checked' : '' }}>
                                <label for="Other1">Other</label>
                            </p>
                        </td>
                        <td colspan="2" class="">
                            <input type="text" name="sign_of_disease[other_text]" value="{{ old('sign_of_disease.other_text', $investigateReport->sign_of_disease['other_text']) }}">
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
                                <input type="radio" name="animal_die_exposure" value="Yes/Died" id="Died1" {{ old('animal_die_exposure', $investigateReport->animal_die_exposure) == 'Yes/Died' ? 'checked' : '' }}>
                                <label for="Died1">Yes, died</label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" value="Yes, was killed" id="WasKilled1" {{ old('animal_die_exposure', $investigateReport->animal_die_exposure) == 'Yes, was killed' ? 'checked' : '' }}>
                                <label for="WasKilled1">Yes, was killed</label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" value="No, still alive" id="StillAlive1" {{ old('animal_die_exposure', $investigateReport->animal_die_exposure) == 'No, still alive' ? 'checked' : '' }}>
                                <label for="StillAlive1">No, still alive</label>
                            </p>
                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" value="No, but died later" id="DiedLater1" {{ old('animal_die_exposure', $investigateReport->animal_die_exposure) == 'No, but died later' ? 'checked' : '' }}>
                                <label for="DiedLater1">No, but died later</label>
                            </p>
                        </td>
                        <td class="">
                            <input type="date" name="animal_die_date" value="{{ old('animal_die_date', $investigateReport->animal_die_date) }}">

                        </td>
                        <td>
                            <p>
                                <input type="radio" name="animal_die_exposure" value="unknown" id="animal_die_exposure_Unknown1" {{ old('animal_die_exposure', $investigateReport->animal_die_exposure) == 'unknown' ? 'checked' : '' }}>
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
                                <input type="radio" name="animal_tested_rabies" value="Yes, Rabies Positive" id="RabiesPositive1" {{ old('animal_tested_rabies', $investigateReport->animal_tested_rabies) == 'Yes, Rabies Positive' ? 'checked' : '' }}>
                                <label for="RabiesPositive1">Yes, Rabies Positive</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_tested_rabies" value="Yes, Rabies Negative" id="RabiesNegative1" {{ old('animal_tested_rabies', $investigateReport->animal_tested_rabies) == 'Yes, Rabies Negative' ? 'checked' : '' }}>
                                <label for="RabiesNegative1">Yes, Rabies Negative</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="animal_tested_rabies" value="No" id="NotTested1" {{ old('animal_tested_rabies', $investigateReport->animal_tested_rabies) == 'No' ? 'checked' : '' }}>
                                <label for="NotTested1">No</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="animal_tested_rabies" value="unknown" id="RabiesUnknown1" {{ old('animal_tested_rabies', $investigateReport->animal_tested_rabies) == 'unknown' ? 'checked' : '' }}>
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
                                <input type="radio" name="animal_vaccinated" value="yes" id="VaccinatedYes1" {{ old('animal_vaccinated', $investigateReport->animal_vaccinated) == 'yes' ? 'checked' : '' }}>
                                <label for="VaccinatedYes1">Yes</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_vaccinated" value="no" id="VaccinatedNo1" {{ old('animal_vaccinated', $investigateReport->animal_vaccinated) == 'no' ? 'checked' : '' }}>
                                <label for="VaccinatedNo1">No</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="animal_vaccinated" value="unknown" id="VaccinatedUnknown1" {{ old('animal_vaccinated', $investigateReport->animal_vaccinated) == 'unknown' ? 'checked' : '' }}>
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
                                <input type="checkbox" name="treatment_applied[washing_with_water]" id="WoundWashingWater1" {{ old('treatment_applied.washing_with_water', $investigateReport->treatment_applied['washing_with_water'] ?? false) ? 'checked' : '' }}>
                                <label for="WoundWashingWater1">Wound washing with water</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="treatment_applied[washing_with_shap]" id="WoundWashingSoapWater1" {{ old('treatment_applied.washing_with_shap', $investigateReport->treatment_applied['washing_with_shap'] ?? false) ? 'checked' : '' }}>
                                <label for="WoundWashingSoapWater1">Wound washing with soap and water</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="treatment_applied[cleaning_with_antiseptic]" id="WoundCleaningAntiseptic1" {{ old('treatment_applied.cleaning_with_antiseptic', $investigateReport->treatment_applied['cleaning_with_antiseptic'] ?? false) ? 'checked' : '' }}>
                                <label for="WoundCleaningAntiseptic1">Wound cleaning with antiseptic lotion</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="treatment_applied[bandaging]" id="Bandaging1" {{ old('treatment_applied.bandaging', $investigateReport->treatment_applied['bandaging'] ?? false) ? 'checked' : '' }}>
                                <label for="Bandaging1">Bandaging</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="treatment_applied[not_known]" id="NotKnown1" {{ old('treatment_applied.not_known', $investigateReport->treatment_applied['not_known'] ?? false) ? 'checked' : '' }}>
                                <label for="NotKnown1">Not known</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="checkbox" name="treatment_applied[any_other]" id="OtherTreatment1" {{ old('treatment_applied.any_other', $investigateReport->treatment_applied['any_other'] ?? false) ? 'checked' : '' }}>
                                <label for="OtherTreatment1">Any other treatment</label> 
                                <input type="text" name="treatment_applied[any_other_text]" value="{{ old('treatment_applied.any_other_text', $investigateReport->treatment_applied['any_other_text']) }}">
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>5.2.1 Were sutures applied to the animal bite wound?</p>
                        </td>
                        <td colspan="2">
                            <p>
                                <input type="radio" name="suturesa_applied" value="yes" id="SuturesAppliedYes1" {{ old('suturesa_applied', $investigateReport->suturesa_applied) == 'yes' ? 'checked' : '' }}>
                                <label for="SuturesAppliedYes1">Yes</label>&nbsp;&nbsp;
                                <input type="radio" name="suturesa_applied" value="no" id="SuturesAppliedNo1" {{ old('suturesa_applied', $investigateReport->suturesa_applied) == 'no' ? 'checked' : '' }}>
                                <label for="SuturesAppliedNo1">No</label>
                            </p>
                        </td>
                        <td colspan="2">
                            <p>Reason for Suturing</p>
                            <input type="text" name="reason_for_suturing" value="{{ old('reason_for_suturing',$investigateReport->reason_for_suturing) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>5.2.2 If yes when sutures were applied? With 72 Hrs of RIG Infiltration</p>
                            <input type="text" name="rig_infiltration" value="{{ old('rig_infiltration',$investigateReport->rig_infiltration) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>5.3 Did the deceased / suspected patient received Rabies Vaccine&nbsp;&nbsp;
                                <input type="radio" name="rabiesVaccineRecieved" value="yes" id="RabiesVaccineReceivedYes" {{ old('rabiesVaccineRecieved',$investigateReport->rabiesVaccineRecieved) == 'yes' ? 'checked' : '' }}>
                                <label for="RabiesVaccineReceivedYes">Yes</label>&nbsp;&nbsp;
                                <input type="radio" name="rabiesVaccineRecieved" value="no" id="RabiesVaccineReceivedNo1" {{ old('rabiesVaccineRecieved',$investigateReport->rabiesVaccineRecieved) == 'no' ? 'checked' : '' }}>
                                <label for="RabiesVaccineReceivedNo1">No</label>&nbsp;&nbsp;
                                <input type="radio" name="rabiesVaccineRecieved" value="unknown" id="RabiesVaccineReceivedUnknown1" {{ old('rabiesVaccineRecieved',$investigateReport->rabiesVaccineRecieved) == 'unknown' ? 'checked' : '' }}>
                                <label for="RabiesVaccineReceivedUnknown1">Unknown</label>
                            </p>
                            <p>&nbsp;</p>
                            <p>
                              If Yes,
                                Number of doses received
                            </p>
                            <p> <label for="RabiesVaccineReceivedYes1"  >1</label>
                                <input type="radio" name="RabiesVaccineReceivedYes" value="1" class = "ml-2" id="RabiesVaccineReceivedYes1" {{ old('RabiesVaccineReceivedYes',$investigateReport->RabiesVaccineReceivedYes) == '1' ? 'checked' : '' }}>  
                                <label for="RabiesVaccineReceivedYes2" > 2</label>
                                <input type="radio" name="RabiesVaccineReceivedYes" value="2" class = "ml-2" id="RabiesVaccineReceivedYes2" {{ old('RabiesVaccineReceivedYes',$investigateReport->RabiesVaccineReceivedYes) == '2' ? 'checked' : '' }}> 
                                 <label for="RabiesVaccineReceivedYes3" > 3</label> 
                                <input type="radio" name="RabiesVaccineReceivedYes" value="3" class = "ml-2" id="RabiesVaccineReceivedYes3" {{ old('RabiesVaccineReceivedYes',$investigateReport->RabiesVaccineReceivedYes) == '3' ? 'checked' : '' }}> 
                                 <label for="RabiesVaccineReceivedYes4" > 4</label> 
                                <input type="radio" name="RabiesVaccineReceivedYes" value="4" class = "ml-2" id="RabiesVaccineReceivedYes4" {{ old('RabiesVaccineReceivedYes',$investigateReport->RabiesVaccineReceivedYes) == '4' ? 'checked' : '' }}> 
                                 <label for="RabiesVaccineReceivedYes5" > 5</label> 
                                <input type="radio" name="RabiesVaccineReceivedYes" value="5" class = "ml-2" id="RabiesVaccineReceivedYes5" {{ old('RabiesVaccineReceivedYes',$investigateReport->RabiesVaccineReceivedYes) == '5' ? 'checked' : '' }}> 
                                <label for="RabiesVaccineReceivedUnknown2">Unknown</label>
                                <input type="radio" name="RabiesVaccineReceivedYes" value="unknown" class = "ml-2" id="RabiesVaccineReceivedUnknown2" {{ old('RabiesVaccineReceivedYes',$investigateReport->RabiesVaccineReceivedYes) == 'unknown' ? 'checked' : '' }}> 
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
                                    {{-- @dd($investigateReport->rabies_vaccine_received); --}}
                                    @foreach($investigateReport->rabies_vaccine_received['date_of_vaccine_administration'] as $index => $dateofvaccineadministration)
                                    <tr id="row{{ $index + 1 }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <input type="text" name="rabies_vaccine_received[date_of_vaccine_administration][]" value="{{ $dateofvaccineadministration }}">
                                        </td>
                                        <td>
                                            <input type="text" name="rabies_vaccine_received[route_of_vaccine_administration][]" value="{{ $investigateReport->rabies_vaccine_received['route_of_vaccine_administration'][$index] ?? old('rabies_vaccine_received.route_of_vaccine_administration.'.$index) ?? '' }}">
                                        </td>
                                        <td>
                                            <input type="text" name="rabies_vaccine_received[site_of_vaccine_administration][]" value="{{ $investigateReport->rabies_vaccine_received['site_of_vaccine_administration'][$index] ?? old('rabies_vaccine_received.site_of_vaccine_administration.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td>
                                            <input type="text" name="rabies_vaccine_received[brand_vaccine][]" value="{{ $investigateReport->rabies_vaccine_received['brand_vaccine'][$index] ?? old('rabies_vaccine_received.brand_vaccine.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td>
                                            @if($investigateReport->rabies_vaccine_received)
                                            <a role="button" class="btn btn-danger remove-table-row float-right"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            @endif
                                        </td>
                                    </tr>
                                   @endforeach
                                   
                                </tbody>
                                <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore2()">Add More</a>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>
                                5.4 If Incomplete PEP, reason:
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><input type="checkbox" name="incomplete_pep[observation_period]" {{ old('incomplete_pep.observation_period',$investigateReport->incomplete_pep['observation_period'] ?? false) ? 'checked' : '' }}> Animal well after observation period</p>
                        </td>
                        <td colspan="2">
                            <p><input type="checkbox" name="incomplete_pep[animal_result_negative]" {{ old('incomplete_pep.animal_result_negative',$investigateReport->incomplete_pep['animal_result_negative'] ?? false) ? 'checked' : '' }}> Animal results negative</p>
                        </td>
                        <td colspan="2">
                            <p><input type="checkbox" name="incomplete_pep[specify_other]" {{ old('incomplete_pep.specify_other',$investigateReport->incomplete_pep['specify_other'] ?? false) ? 'checked' : '' }}> Specify if other:</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><input type="checkbox" name="incomplete_pep[victim_previously]" {{ old('incomplete_pep.victim_previously',$investigateReport->incomplete_pep['victim_previously'] ?? false) ? 'checked' : '' }}> Victim previously immunized</p>
                        </td>
                        <td colspan="2">
                            <p><input type="checkbox" name="incomplete_pep[victim_refused]" {{ old('incomplete_pep.victim_refused',$investigateReport->incomplete_pep['victim_refused'] ?? false) ? 'checked' : '' }}> Victim refused further doses</p>
                        </td>
                        <td colspan="2" class="" rowspan="2" class="">
                            <input type="text" name="incomplete_pep[text]" value="{{ old('incomplete_pep.text',$investigateReport->incomplete_pep['text']) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p><input type="checkbox" name="incomplete_pep[loss_follow_up]" {{ old('incomplete_pep.loss_follow_up',$investigateReport->incomplete_pep['loss_follow_up'] ?? false) ? 'checked' : '' }}> Lost to follow-up</p>
                        </td>
                        <td colspan="4">
                            <p><input type="checkbox" name="incomplete_pep[referred_out_jurisdiction]" {{ old('incomplete_pep.referred_out_jurisdiction',$investigateReport->incomplete_pep['referred_out_jurisdiction'] ?? false) ? 'checked' : '' }}> Referred out of jurisdiction</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>5.5 Rabies Immunoglobulin (RIG) (or RmAb) received?</p>
                        </td>
                        <td colspan="4">
                            <p><input type="radio" name="rabies_immunoglobulin" value="yes" id="rabies_immunoglobulin1" {{ old('rabies_immunoglobulin',$investigateReport->rabies_immunoglobulin) == 'yes' ? 'checked' : '' }}> 
                            <label for="rabies_immunoglobulin1">Yes</label> 
                            <input type="radio" name="rabies_immunoglobulin" value="no" class="ml-2" id="rabies_immunoglobulin2" {{ old('rabies_immunoglobulin',$investigateReport->rabies_immunoglobulin) == 'no' ? 'checked' : '' }}> 
                            <label for="rabies_immunoglobulin2">No</label></p>
                        </td>
                    </tr>
                    <!-- ***** ***********************************************************-->
                    <tr>
                        <td colspan="1" rowspan="2">
                            <p>
                              If yes,
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
                                <input type="radio" name="rabies_immunoglobulin_site" value="Into wound" id="IntoWound1" {{ old('rabies_immunoglobulin_site',$investigateReport->rabies_immunoglobulin_site) == 'Into wound' ? 'checked' : '' }}>
                                <label for="IntoWound1">Into wound</label>
                                <input type="radio" name="rabies_immunoglobulin_site" value="IM (not recommended)" id="IM1" {{ old('rabies_immunoglobulin_site',$investigateReport->rabies_immunoglobulin_site) == 'IM (not recommended)' ? 'checked' : '' }}>
                                <label for="IM1">IM (not recommended)</label>
                                <input type="radio" name="rabies_immunoglobulin_site" value="both" id="Both1" {{ old('rabies_immunoglobulin_site',$investigateReport->rabies_immunoglobulin_site) == 'both' ? 'checked' : '' }}>
                                <label for="Both1">Both</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="">
                            <input type="text" name="brand_name" value="{{ old('brand_name',$investigateReport->brand_name) }}">
                        </td>
                        <td colspan="2" class="">
                            <input type="text" name="rig_administration" value="{{ old('rig_administration',$investigateReport->rig_administration) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>5.6 Had the patient ever been vaccinated against rabies prior to this exposure?</p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="vaccinated_against_rabies" value="yes" id="vaccinated_against_rabies_yes" {{ old('vaccinated_against_rabies',$investigateReport->vaccinated_against_rabies) == 'yes' ? 'checked' : '' }}>
                                <label for="vaccinated_against_rabies_yes">Yes</label> Year & number of doses:
                            </p>
                        </td>
                        <td colspan="2" class="" class="">
                            <input type="text" name="year_no_of_dose" value="{{ old('year_no_of_dose',$investigateReport->year_no_of_dose) }}">
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="vaccinated_against_rabies" value="no" id="vaccinated_against_rabies_no" {{ old('vaccinated_against_rabies',$investigateReport->vaccinated_against_rabies) == 'no' ? 'checked' : '' }}>
                                <label for="vaccinated_against_rabies_no">No</label>
                                <br>
                                <input type="radio" name="vaccinated_against_rabies" value="unknown" id="vaccinated_against_rabies_unknown" class="ml-2" {{ old('vaccinated_against_rabies',$investigateReport->vaccinated_against_rabies) == 'unknown' ? 'checked' : '' }}>
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
                                <input type="radio" name="TT_vaccine" value="yes" id="TTRcvdYes1" {{ old('TT_vaccine',$investigateReport->TT_vaccine) == 'yes' ? 'checked' : '' }}>
                                <label for="TTRcvdYes1">Yes</label>
                            </p>
                        </td>
                        <td colspan="1">
                            <p>
                                <input type="radio" name="TT_vaccine" value="no" id="TTRcvdNo1" {{ old('TT_vaccine',$investigateReport->TT_v) == 'no' ? 'checked' : '' }}>
                                <label for="TTRcvdNo1">No</label>
                            </p>
                        </td>
                    </tr>
            </table>
        </div>
        <!-- **************************************************first***********************************  -->
       
        <div class="dashboard-filter mb-4">
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
                                            <input type="radio" name="fever" value="yes" {{ old('fever',$investigateReport->fever) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="fever" value="no" {{ old('fever',$investigateReport->fever) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="fever" value="unknown" {{ old('fever',$investigateReport->fever) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Headache</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="headache" value="yes" {{ old('headache',$investigateReport->headache) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="headache" value="no" {{ old('headache',$investigateReport->headache) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="headache" value="unknown" {{ old('headache',$investigateReport->headache) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Vomiting</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="vomiting" value="yes" {{ old('vomiting',$investigateReport->vomiting) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="vomiting" value="no" {{ old('vomiting',$investigateReport->vomiting) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="vomiting" value="unknown" {{ old('vomiting',$investigateReport->vomiting) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Muscle spasm</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="muscle_spasm" value="yes" {{ old('muscle_spasm',$investigateReport->muscle_spasm) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="muscle_spasm" value="no" {{ old('muscle_spasm',$investigateReport->muscle_spasm) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="muscle_spasm" value="unknown" {{ old('muscle_spasm',$investigateReport->muscle_spasm) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Anorexia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="anorexia" value="yes" {{ old('anorexia',$investigateReport->anorexia) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="anorexia" value="no" {{ old('anorexia',$investigateReport->anorexia) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="anorexia" value="unknown" {{ old('anorexia',$investigateReport->anorexia) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Priapism</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="priapism" value="yes" {{ old('priapism',$investigateReport->priapism) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="priapism" value="no" {{ old('priapism',$investigateReport->priapism) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="priapism" value="unknown" {{ old('priapism',$investigateReport->priapism) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Aerophobia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="aerophobia" value="yes" {{ old('aerophobia',$investigateReport->aerophobia) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="aerophobia" value="no" {{ old('aerophobia',$investigateReport->aerophobia) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="aerophobia" value="unknown" {{ old('aerophobia',$investigateReport->aerophobia) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Localized weakness</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_weakness" value="yes" {{ old('localized_weakness',$investigateReport->localized_weakness) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_weakness" value="no" {{ old('localized_weakness',$investigateReport->localized_weakness) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_weakness" value="unknown" {{ old('localized_weakness',$investigateReport->localized_weakness) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Confusion</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="confusion" value="yes" {{ old('confusion',$investigateReport->confusion) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="confusion" value="no" {{ old('confusion',$investigateReport->confusion) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="confusion" value="unknown" {{ old('confusion',$investigateReport->confusion) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Agitation</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="agitation" value="yes" {{ old('agitation',$investigateReport->agitation) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="agitation" value="no" {{ old('agitation',$investigateReport->agitation) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="agitation" value="unknown" {{ old('agitation',$investigateReport->agitation) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Autonomic instability</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="autonomic_instability" value="yes" {{ old('autonomic_instability',$investigateReport->autonomic_instability) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="autonomic_instability" value="no" {{ old('autonomic_instability',$investigateReport->autonomic_instability) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="autonomic_instability" value="unknown" {{ old('autonomic_instability',$investigateReport->autonomic_instability) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Insomnia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="insomnia" value="yes" {{ old('insomnia',$investigateReport->insomnia) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="insomnia" value="no" {{ old('insomnia',$investigateReport->insomnia) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="insomnia" value="unknown" {{ old('insomnia',$investigateReport->insomnia) == 'unknown' ? 'checked' : '' }}>
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
                                            <input type="radio" name="malaise" value="yes" {{ old('malaise',$investigateReport->malaise) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="malaise" value="no" {{ old('malaise',$investigateReport->malaise) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="malaise" value="unknown" {{ old('malaise',$investigateReport->malaise) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Nausea</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="nausea" value="yes" {{ old('nausea',$investigateReport->nausea) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="nausea" value="no" {{ old('nausea',$investigateReport->nausea) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="nausea" value="unknown" {{ old('nausea',$investigateReport->nausea) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Anxiety</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="anxiety" value="yes" {{ old('anxiety',$investigateReport->anxiety) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="anxiety" value="no" {{ old('anxiety',$investigateReport->anxiety) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="anxiety" value="unknown" {{ old('anxiety',$investigateReport->anxiety) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Dysphasia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="dysphasia" value="yes" {{ old('dysphasia',$investigateReport->dysphasia) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="dysphasia" value="no" {{ old('dysphasia',$investigateReport->dysphasia) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="dysphasia" value="unknown" {{ old('dysphasia',$investigateReport->dysphasia) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Ataxia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="ataxia" value="yes" {{ old('ataxia',$investigateReport->ataxia) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="ataxia" value="no" {{ old('ataxia',$investigateReport->ataxia) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="ataxia" value="unknown" {{ old('ataxia',$investigateReport->ataxia) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Seizures</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="seizures" value="yes" {{ old('seizures',$investigateReport->seizures) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="seizures" value="no" {{ old('seizures',$investigateReport->seizures) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="seizures" value="unknown" {{ old('seizures',$investigateReport->seizures) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Hydrophobia</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="hydrophobia" value="yes" {{ old('hydrophobia',$investigateReport->hydrophobia) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="hydrophobia" value="no" {{ old('hydrophobia',$investigateReport->hydrophobia) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="hydrophobia" value="unknown" {{ old('hydrophobia',$investigateReport->hydrophobia) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Localized pain</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_pain" value="yes" {{ old('localized_pain',$investigateReport->localized_pain) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_pain" value="no" {{ old('localized_pain',$investigateReport->localized_pain) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="localized_pain" value="unknown" {{ old('localized_pain',$investigateReport->localized_pain) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Delirium</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="delirium" value="yes" {{ old('delirium',$investigateReport->delirium) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="delirium" value="no" {{ old('delirium',$investigateReport->delirium) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="delirium" value="unknown" {{ old('delirium',$investigateReport->delirium) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Aggressiveness</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="aggressiveness" value="yes" {{ old('aggressiveness',$investigateReport->aggressiveness) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="aggressiveness" value="no" {{ old('aggressiveness',$investigateReport->aggressiveness) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="aggressiveness" value="unknown" {{ old('aggressiveness',$investigateReport->aggressiveness) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Hyperactivity</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="hyperactivity" value="yes" {{ old('hyperactivity',$investigateReport->hyperactivity) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="hyperactivity" value="no" {{ old('hyperactivity',$investigateReport->hyperactivity) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="hyperactivity" value="unknown" {{ old('hyperactivity',$investigateReport->hyperactivity) == 'unknown' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>Hypersalivation Any other:</p>
                                        </td>
                                        <td>
                                            <input type="radio" name="hypersalivation" value="yes" {{ old('hypersalivation',$investigateReport->hypersalivation) == 'yes' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="hypersalivation" value="no" {{ old('hypersalivation',$investigateReport->hypersalivation) == 'no' ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <input type="radio" name="hypersalivation" value="unknown" {{ old('hypersalivation',$investigateReport->hypersalivation) == 'unknown' ? 'checked' : '' }}>
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
                        <td colspan="3" class="">
                            <input type="date" name="symptoms_onset_date" value="{{ old('symptoms_onset_date',$investigateReport->symptoms_onset_date) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>6.3 Date of death</p>
                        </td>
                        <td colspan="1" class="">
                            <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$investigateReport->date_of_birth) }}">
                        </td>
                        <td colspan="1">
                            <p><input type="checkbox" name="alive" value="Alive" {{ old('alive',$investigateReport->alive) ? 'checked' : '' }}> Alive</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>
                                6.4 If deceased,
                                where did deceased die
                            </p>
                        </td>
                        <td colspan="3">

                            <p>
                                <label for="deceased_die">Home</label>
                                <input type="radio" name="deceased_die" value="home" id="deceased_die" {{ old('deceased_die',$investigateReport->deceased_die) == 'home' ? 'checked' : '' }}>
                                 <label for="deceased_die_health_facility">Health facility</label>
                                <input type="radio" name="deceased_die" value="Health facility" id="deceased_die_health_facility" {{ old('deceased_die',$investigateReport->deceased_die) == 'Health facility' ? 'checked' : '' }}>
                                
                                <input type="text" class="mr-2" name="deceased_die_health_facility_input" value="{{ old('deceased_die_health_facility_input',$investigateReport->deceased_die_health_facility_input) }}" id="deceased_die_health_facility_input" {{ old('deceased_die_health_facility_input') ? 'style=display:block' : '' }}>

                                 <label for="deceased_die_other">Other</label>
                                 <input type="radio" name="deceased_die" value="Other" id="deceased_die_other" {{ old('deceased_die',$investigateReport->deceased_die) == 'Other' ? 'checked' : '' }}> 
                                 <input type="text" name="deceased_die_other_input" value="{{ old('deceased_die_other_input',$investigateReport->deceased_die_other_input) }}" id="deceased_die_other_input" {{ old('deceased_die_other_input') ? 'style=display:block' : '' }}></p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p>6.5 During the illness did the deceased/ suspected patient seek medical help?</p>
                        </td>
                        <td colspan="2">
                            <p><input type="radio" name="medical_help" value="yes" id="medical_help_yes" {{ old('medical_help',$investigateReport->medical_help) == 'yes' ? 'checked' : '' }}>
                            <label for="medical_help_yes">Yes</label>
                                 
                                <input type="radio" name="medical_help" value="no" id="medical_help_no" {{ old('medical_help',$investigateReport->medical_help) == 'no' ? 'checked' : '' }}>
                                <label for="medical_help_no">No</label>
                                 
                                <input type="radio" name="medical_help" value="unknown" id="medical_help_unknown" {{ old('medical_help',$investigateReport->medical_help) == 'unknown' ? 'checked' : '' }}> 
                                <label for="medical_help_unknown">Unknown</label>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                6.6  If Yes,
                                please share details of health facilities
                            </p>
                        </td>
                    </tr>
                    <tr> 
                        <td colspan="1">
                            <p>Name of Hospital/ Health facility (City/Village)</p>
                        </td>
                        @if ($investigateReport->medical_help == 'yes')
                            <td colspan="1" class=" w-25">
                                <input type="text" name="name_of_hf_1" class="healthFacilityEdit" value="{{old('name_of_hf_1', $investigateReport->name_of_hf_1)}}" id="name_of_hf_1" placeholder="HF-1">
                            </td>
                            <td colspan="1" class=" w-25">
                                <input type="text" name="name_of_hf_2" class="healthFacilityEdit" value="{{old('name_of_hf_2', $investigateReport->name_of_hf_2)}}" id="name_of_hf_2" placeholder="HF-2">
                            </td>
                            <td colspan="1" class=" w-25">
                                <input type="text" name="name_of_hf_3" class="healthFacilityEdit" value="{{old('name_of_hf_3', $investigateReport->name_of_hf_3)}}" id="name_of_hf_3" placeholder="HF-3">
                            </td>  
                        @else
                            <td colspan="1" class=" w-25">
                                <input type="text" name="name_of_hf_1" class="healthFacility" value="{{old('name_of_hf_1')}}" id="name_of_hf_1" placeholder="HF-1">
                            </td>
                            <td colspan="1" class=" w-25">
                                <input type="text" name="name_of_hf_2" class="healthFacility" value="{{old('name_of_hf_2')}}" id="name_of_hf_2" placeholder="HF-2">
                            </td>
                            <td colspan="1" class=" w-25">
                                <input type="text" name="name_of_hf_3" class="healthFacility" value="{{old('name_of_hf_3')}}" id="name_of_hf_3" placeholder="HF-3">
                            </td>
                        @endif
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>Date of consultation</p>
                        </td>
                        <td colspan="1" class="">
                            <input type="date" name="hf_1date" value="{{ old('hf_1date',$investigateReport->hf_1date) }}">
                        </td>
                        <td colspan="1" class="">
                            <input type="date" name="hf_2date" value="{{ old('hf_2date',$investigateReport->hf_2date) }}">
                        </td>
                        <td colspan="1" class="">
                            <input type="date" name="hf_3date" value="{{ old('hf_3date',$investigateReport->hf_3date) }}">
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
                                    @foreach($investigateReport->laboratory_specific_test['test_performed'] as $index => $testPerformed)
                                    <tr id="row{{ $index + 1 }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td >
                                            <input type="text" name="laboratory_specific_test[test_performed][]" value="{{ $testPerformed }}">
                                        </td>
                                        <td >
                                            <input type="text" name="laboratory_specific_test[Hospital_lab][]" value="{{ $investigateReport->laboratory_specific_test['Hospital_lab'][$index] ?? old('laboratory_specific_test.Hospital_lab.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td >
                                            <input type="date" name="laboratory_specific_test[specific_test_date][]" value="{{ $investigateReport->laboratory_specific_test['specific_test_date'][$index] ?? old('laboratory_specific_test.specific_test_date.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td >
                                            <input type="text" name="laboratory_specific_test[result][]" value="{{ $investigateReport->laboratory_specific_test['result'][$index] ?? old('laboratory_specific_test.result.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td >
                                            <input type="text" name="laboratory_specific_test[comment][]" value="{{ $investigateReport->laboratory_specific_test['comment'][$index] ?? old('laboratory_specific_test.comment.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td>
                                            @if($investigateReport->laboratory_specific_test)
                                            <a role="button" class="btn btn-danger remove-table-row float-right">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                              
                                </tbody>
                                <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore3()">Add More</a>
                            </table>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <p>
                                6.8 MRI brain done? &nbsp;
                                <label for="MRI_brain_done_yes">Yes</label>
                               
                                <input type="radio" name="MRI_brain_done" value="yes" id="MRI_brain_done_yes" {{ old('MRI_brain_done',$investigateReport->MRI_brain_done) == 'yes' ? 'checked' : '' }}>
                                <label for="MRI_brain_done_no">No</label>
                                <input type="radio" name="MRI_brain_done" value="no" id="MRI_brain_done_no" {{ old('MRI_brain_done',$investigateReport->MRI_brain_done) == 'no' ? 'checked' : '' }}> &nbsp;if yes write significant finding
                            </p>
                        </td>
                        <td colspan="4">
                            @if ($investigateReport->MRI_brain_done == "yes")
                              <input type="text" name="MRI_brain_done_text" value="{{ old('MRI_brain_done_text', $investigateReport->MRI_brain_done_text)}}" class="inputFieldsEdit">
                            @else
                              <input type="text" name="MRI_brain_done_text" value="{{ old('MRI_brain_done_text')}}" class="inputFields">
                            @endif
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
                                <input type="radio" name="postmortem" value="yes" id="postmortem_yes" {{ old('postmortem',$investigateReport->postmortem) == 'yes' ? 'checked' : '' }}>
                                
                                <label for="postmortem_no">No</label>
                                <input type="radio" name="postmortem" value="no" id="postmortem_no" {{ old('postmortem',$investigateReport->postmortem) == 'no' ? 'checked' : '' }}>
                                
                                <label for="postmortem_unknown">unknown</label>
                                <input type="radio" name="postmortem" value="unknown" id="postmortem_unknown" {{ old('postmortem',$investigateReport->postmortem) == 'unknown' ? 'checked' : '' }}> </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>
                                If Yes,
                                Copy of report
                                available ? &nbsp;
                                <label for="copy_of_report_yes">Yes</label>
                                <input type="radio" name="copy_of_report" value="yes" id="copy_of_report_yes" {{ old('copy_of_report',$investigateReport->copy_of_report) == 'yes' ? 'checked' : '' }}>
                                <label for="copy_of_report_no">No</label>
                                <input type="radio" name="copy_of_report" value="no" id="copy_of_report_no" {{ old('copy_of_report',$investigateReport->copy_of_report) == 'no' ? 'checked' : '' }}>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.1.1 Did deceased have any evidence of recent wounds? &nbsp;
                                <input type="radio" name="evidence_of_recent_wounds" value="yes" {{ old('evidence_of_recent_wounds',$investigateReport->evidence_of_recent_wounds) == 'yes' ? 'checked' : '' }}>
                                Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="evidence_of_recent_wounds" value="no" {{ old('evidence_of_recent_wounds',$investigateReport->evidence_of_recent_wounds) == 'no' ? 'checked' : '' }}> No</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.1.2 Did deceased have any evidence of healed wounds? &nbsp;&nbsp;
                                <input type="radio" name="evidence_of_healed_wounds" value="yes" {{ old('evidence_of_healed_wounds',$investigateReport->evidence_of_healed_wounds) == 'yes' ? 'checked' : '' }}>
                                Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="evidence_of_healed_wounds" value="no" {{ old('evidence_of_healed_wounds',$investigateReport->evidence_of_healed_wounds) == 'no' ? 'checked' : '' }}>No
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <p>7.2 Death certificate
                                available:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="certificate_available" value="yes" {{ old('certificate_available',$investigateReport->certificate_available) == 'yes' ? 'checked' : '' }}>
                                Yes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="certificate_available" value="no" {{ old('certificate_available',$investigateReport->certificate_available) == 'no' ? 'checked' : '' }}>
                                No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="certificate_available" value="unknown" {{ old('certificate_available',$investigateReport->certificate_available) == 'unknown' ? 'checked' : '' }}> Unknown</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1">
                            <p>If yes, cause of death mentioned:</p>
                        </td>
                        <td colspan="3" class="">
                            <input type="text" name="death_mentioned" value="{{ old('death_mentioned',$investigateReport->death_mentioned) }}">
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
                                <input type="radio" name="contact_tracking" value="yes" id="contact_tracking_yes" {{ old('contact_tracking',$investigateReport->contact_tracking) == 'yes' ? 'checked' : '' }}>
                                <label for="contact_tracking_no">No</label>
                                <input type="radio" name="contact_tracking" value="no" id="contact_tracking_no" {{ old('contact_tracking',$investigateReport->contact_tracking) == 'no' ? 'checked' : '' }}>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
        <!-- **************************************************** -->
        <!-- **************************************************************** -->
        <div class="dashboard-filter mb-4">
            <table>
                <tbody>
                    <tr>
                        <td colspan="1">
                            <p>
                                If yes
                                , Details of person to initiate verbal autopsy of additional cases:
                            </p>
                        </td>
                        <td colspan="2" class="">
                            <input type="text" name="autopsy_of_additional_cases" value="{{ old('autopsy_of_additional_cases',$investigateReport->autopsy_of_additional_cases) }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p style="display: block;">
                                8.2 Collect the names and contact information for any person below who had close contact
                                    with the suspected rabies case in the last 14 days of onset of symptoms. ( <em>Close
                                    contacts were likely to have had their hands or open cuts, wounds, or mucous membranes
                                    in contact with a patient&#39;s saliva,respiratory secretions, autopsy material, or
                                    other potentially infectious material</em>)
                            </p>
                            <p><b>Contact : </b></p>
                            <p class="mb-3">
                                <input type="checkbox" name="contact_with_patient" class="contact_with_patient_checkbox" id="contact_with_patient_family" {{ $investigateReport->family ? 'checked' : '' }}>
                                <label for="contact_with_patient_family" class="mr-3">Family</label>
                                <input type="checkbox" name="contact_with_patient" class="contact_with_patient_checkbox" id="contact_with_patient_community" {{ $investigateReport->community ? 'checked' : '' }}>
                                <label for="contact_with_patient_community" class="mr-3">Community</label>
                                <input type="checkbox" name="contact_with_patient" class="contact_with_patient_checkbox" id="contact_with_patient_hospital_workers" {{ $investigateReport->hospital_workers ? 'checked' : '' }}>
                                <label for="contact_with_patient_hospital_workers" class="mr-3">Hospital workers</label>
                                <input type="checkbox" name="contact_with_patient" class="contact_with_patient_checkbox" id="contact_with_patient_any_other" {{ $investigateReport->any_other ? 'checked' : '' }}>
                                <label for="contact_with_patient_any_other" class="mr-3">Any Other</label>
                            </p>
                            {{-- <a role="button" class="btn btn-primary add-table-row float-right mb-2" onclick="addMore5()" id="add_more5">Add More</a> --}}
                            <table class="table_8_2">
                                <thead>
                                   <tr>
                                        <th> Relation with Patient</th>
                                        <th> Name</th>
                                        <th> Address</th>
                                        <th> Contact Number</th>
                                        {{-- <th> Action</th> --}}
                                    </tr>
                                  
                                </thead>
                                <tbody>
                                    @if($investigateReport->family)
                                    <tr>
                                        <td>Family</td>
                                        <td><input type="text" name="family[relation_with_family_name]" value="{{ old('family.relation_with_family_name',$investigateReport->family['relation_with_family_name']) }}"></td>
                                        <td><input type="text" name="family[relation_with_family_address]" value="{{ old('family.relation_with_family_address',$investigateReport->family['relation_with_family_address']) }}"></td>
                                        <td><input type="text" name="family[relation_with_family_contact_number]" value="{{ old('family.relation_with_family_contact_number',$investigateReport->family['relation_with_family_contact_number']) }}"></td>
                                    </tr>
                                    @endif
                                    @if($investigateReport->community)
                                    <tr>
                                        <td>Community</td>
                                        <td><input type="text" name="community[relation_with_community_name]" value="{{ old('community.relation_with_community_name',$investigateReport->community['relation_with_community_name']) }}"></td>
                                        <td><input type="text" name="community[relation_with_community_address]" value="{{ old('community.relation_with_community_address',$investigateReport->community['relation_with_community_address']) }}"></td>
                                        <td><input type="text" name="community[relation_with_community_contact_number]" value="{{ old('community.relation_with_community_contact_number',$investigateReport->community['relation_with_community_contact_number']) }}"></td>
                                    </tr>
                                    @endif
                                    @if($investigateReport->hospital_workers)
                                    <tr>
                                        <td>Hospital workers</td>
                                        <td><input type="text" name="hospital_workers[relation_with_hospital_workers_name]" value="{{ old('hospital_workers.relation_with_hospital_workers_name',$investigateReport->hospital_workers['relation_with_hospital_workers_name']) }}"></td>
                                        <td><input type="text" name="hospital_workers[relation_with_hospital_workers_address]" value="{{ old('hospital_workers.relation_with_hospital_workers_address',$investigateReport->hospital_workers['relation_with_hospital_workers_address']) }}"></td>
                                        <td><input type="text" name="hospital_workers[relation_with_hospital_workers_contact_number]" value="{{ old('hospital_workers.relation_with_hospital_workers_contact_number',$investigateReport->hospital_workers['relation_with_hospital_workers_contact_number']) }}"></td>
                                    </tr>
                                    @endif
                                    @if($investigateReport->any_other)
                                    <tr>
                                        <td>Any Other</td>
                                        <td><input type="text" name="any_other[relation_with_any_other_name]" value="{{ old('any_other.relation_with_any_other_name',$investigateReport->any_other['relation_with_any_other_name']) }}"></td>
                                        <td><input type="text" name="any_other[relation_with_any_other_address]" value="{{ old('any_other.relation_with_any_other_address',$investigateReport->any_other['relation_with_any_other_address']) }}"></td>
                                        <td><input type="text" name="any_other[relation_with_any_other_contact_number]" value="{{ old('any_other.relation_with_any_other_contact_number',$investigateReport->any_other['relation_with_any_other_contact_number']) }}"></td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <p style="display: block;">
                                8.3 Collect the names and contact information for any people who had contact with the
                                    animal suspected of transmitting rabies to the case. Including details of animal
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
                                    @foreach($investigateReport->animal_suspected_transmitting['transmitting_rabies_name_address'] as $index => $transmittingrabiesnameAddress)
                                    <tr id="row{{ $index + 1 }}">
                                        <td>{{ $index + 1 }}</td>
                                        <td >
                                            <input type="text" name="animal_suspected_transmitting[transmitting_rabies_name_address][]" value="{{ $transmittingrabiesnameAddress }}">
                                        </td>
                                        <td >
                                            <input type="text" name="animal_suspected_transmitting[transmitting_rabies_relation][]" value="{{ $investigateReport->animal_suspected_transmitting['transmitting_rabies_relation'][$index] ?? old('animal_suspected_transmitting.transmitting_rabies_relation.'.$index) ?? '' ?? '' }}">
                                        </td>
                                        <td>
                                            @if($investigateReport->animal_suspected_transmitting)
                                            <a role="button" class="btn btn-danger remove-table-row float-right">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

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
                                    <input type="radio" name="probable_rabies" value="yes" id="probable_rabies_yes" {{ old('probable_rabies',$investigateReport->probable_rabies) == 'yes' ? 'checked' : '' }}>
                                    <label for="probable_rabies_no">No</label>
                                    <input type="radio" name="probable_rabies" value="no" id="probable_rabies_no" {{ old('probable_rabies',$investigateReport->probable_rabies) == 'no' ? 'checked' : '' }}>
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
        <div class="d-flex justify-content-center">  
            <button class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-danger w-auto ml-2">Reset</button>
        </div>
        </div>
       
    </div>
   
  </form>
@endsection
