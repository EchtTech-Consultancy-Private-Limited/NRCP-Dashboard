@extends('layouts.main')
@section('title')
{{__('Quality Form')}}
@endsection
@section('content')
<div class="container-fluid">

    <div class="dashboard">
        <div class="dashboard-filter quality-form mb-4">
            <form action="{{ route('quality-add') }}" method="post" class="" id="quality_assurance">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="state">PTILCPR<span class="star" tooltip>*</span></label>
                            <select class="form-select" aria-label="Default select example" name="pt" id="pt">
                                <option value=""> Select </option>
                                <option value='yes'>Yes</option>
                                <option value='no'>No</option>
                            </select>
                            @error('pt')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="district">PTPNABL(ISO 17043)<span class="star">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="accredited_pt"
                                id="accredited_pt">
                                <option value=""> Select</option>
                                <option value='yes'>Yes</option>
                                <option value='no'>No</option>
                            </select>
                            @error('accredited_pt')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="fromYear">LSPTISO 15189/ISO17025</label>
                            <select class="form-select" aria-label="Default select example" name="supervisors_trained"
                                id="supervisors_trained">
                                <option value=""> Select</option>
                                <option value='yes'>Yes</option>
                                <option value='no'>No</option>
                            </select>
                            <small id="supervisors_trained-error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="diseasesSyndromes">LIMS available</label>
                            <select class="form-select" name="lims" id="lims">
                                <option value=""> Select</option>
                                <option value='yes'>Yes</option>
                                <option value='no'>No</option>
                            </select>
                            <small id="lims-error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col search-reset">
                        <div class="apply-filter mt-xl-4 mt-lg-3 pt-1">
                            <button type="submit" class="btn bg-primary search-patient-btn mt-0 mr-1">Save</button>
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
                <div id="quality_assurance_success"></div>
                <table id="general_profiles_TABLE" class="display">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>PTILCPR</th>
                            <th>PTPNABL(ISO 17043)</th>
                            <th>LSPTISO 15189/ISO17025</th>
                            <th>LIMS available</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($quality_assurances as $data)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst($data->pt)}}</td>
                            <td>{{ucfirst($data->accredited_pt)}}</td>
                            <td>{{ucfirst($data->supervisors_trained)}}</td>
                            <td>{{ucfirst($data->lims)}}</td>
                            <td>
                                <a href="{{ url('quality-edit',$data->id) }}" class="btn btn-primary editbtn btn-sm"
                                    title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                <a href="{{ route('quality-destroy', $data->id) }}"
                                    class="btn btn-danger deletebtn btn-sm delete-user mt-xl-0 mt-lg-2"
                                    title="Delete Data" id="delete">
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