@extends('layouts.main')
@section('title')
{{__('Rabies Test Form')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard">
        <div class="dashboard-filter mb-4 rabies-test">
            <form action="{{ route('rabies-test-carried') }}" method="post" class="" id="rabies_detail_test">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="state">Date<span class="star">*</span></label>
                            <input type="date" class="form-control" aria-label="Default select example" name="date"
                                id="date">
                            @error('date')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district">Number of Patients<span class="star">*</span></label>
                            <input type="text" maxlength="5" oninput="validateInput(this)" class="form-control"
                                aria-label="Default select example" name="number_of_patients" id="number_of_patients">
                            @error('number_of_patients')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fromYear">Number of Sample Recieves</label>
                            <input type="text" maxlength="5" oninput="validateInput(this)" class="form-control"
                                aria-label="Default select example" name="numbers_of_sample_recieved"
                                id="numbers_of_sample_recieved">
                            @error('numbers_of_sample_recieved')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                            <small id="supervisors_trained-error" class="form-text text-muted">
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Type of Sample<span class="star">*</span></label>
                            <select class="form-control" name="typefdte" id="typefdte">
                                <option value=""> Select</option>
                                <option value='For diagnosis'>For diagnosis</option>
                                <option value='Titre estimation'>Titre estimation</option>
                            </select>
                            @error('typefdte')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Type of Sample A</label>
                            <select class="form-control" name="typea" id="typea">
                            </select>
                            @error('type')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Type of Sample B</label>
                            <select class="form-control" name="typeb" id="typeb">
                            </select>
                            @error('type')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Method of Diagnosis</label>
                            <select class="form-control" name="method_of_diagnosis" id="method_of_diagnosis">
                                <option value=""> Select
                                </option>
                                <option value='NAAT'>NAAT</option>
                                <option value='ELISA'>ELISA</option>
                                <option value='PFFIT'>PFFIT</option>
                                <option value='DFAT'>DFAT</option>
                                <option value='OTHERS'>Others</option>
                            </select>
                            <small id="lims-error" class="form-text text-muted">
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Number of Test Conducted</label>
                            <input type="text" maxlength="5" oninput="validateInput(this)" class="form-control"
                                aria-label="Default select example" name="numbers_of_test" id="numbers_of_test">
                            @error('numbers_of_test')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                            <small id="lims-error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Total Number of Positive</label>
                            <input type="text" maxlength="5" oninput="validateInput(this)" class="form-control"
                                aria-label="Default select example" name="numbers_of_positives"
                                id="numbers_of_positives">
                            @error('numbers_of_positives')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                            <small id="lims-error" class="form-text text-muted">
                            </small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">Number Entered into the IHIP</label>
                            <input type="text" maxlength="5" oninput="validateInput(this)" class="form-control"
                                aria-label="Default select example" name="numbers_of_intered_ihip"
                                id="numbers_of_intered_ihip">
                            @error('numbers_of_intered_ihip')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col search-reset">
                        <div class="apply-filter mt-4 pt-1">
                            <button type="submit" class="btn bg-primary search-patient-btn mt-0  mr-3">Save</button>
                            <button type="reset" class="btn bg-danger">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="dashboard">
        <div class="dashboard-filter mb-4">
            <div class="" id="nav-add-patient-record" role="tabpanel" aria-labelledby="home-tab">
                <table id="general_profiles_TABLE" class="display table-responsive">
                    <thead>
                        <tr>
                            <th class="text-nowrap">Sr.No.</th>
                            <th class="text-nowrap">Date</th>
                            <th class="text-nowrap">Patients No.</th>
                            <th class="text-nowrap">Sample Recieved</th>
                            <th class="text-nowrap">Type Sample</th>
                            <th class="text-nowrap">Type Sample A</th>
                            <th class="text-nowrap">Type Sample B</th>
                            <th class="text-nowrap">Diagnosis</th>
                            <th class="text-nowrap">Test</th>
                            <th class="text-nowrap">Positives</th>
                            <th class="text-nowrap">IHIP</th>
                            {{-- <th class="text-nowrap">State</th> --}}
                            <th class="text-nowrap">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rabies_test as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="text-nowrap">{{date('d-m-Y',strtotime($data->date))}}</td>
                            <td>{{$data->number_of_patients}}</td>
                            <td>{{$data->numbers_of_sample_recieved}}</td>
                            <td class="text-nowrap">
                                {{($data->type =='For diagnosis')?'For diagnosis':'Titre estimation'}}
                            </td>
                            <td>{{@$data->typea}}</td>
                            <td>{{@$data->typeb}}</td>
                            <td>{{$data->method_of_diagnosis}}</td>
                            <td>{{$data->numbers_of_test}}</td>
                            <td>{{$data->numbers_of_positives}}</td>
                            <td>{{$data->numbers_of_intered_ihip}}</td>
                            {{-- <td>{{@$data->state->state_name}}</td> --}}
                            <td class="text-nowrap">
                                <a href="{{ url('rabies-test-edit',$data->id) }}" class="btn btn-primary editbtn btn-sm"
                                    title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                <a href="javascript:void(0)" data-url="{{ route('rabies-test-destroy', $data->id) }}"
                                    class="btn btn-danger deletebtn btn-sm delete-user" title="Delete Data" id="delete">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection