@extends('layouts.main')
@section('title')
{{__('Quality Edit')}}
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard">
        <div class="dashboard-filter mb-4">
            <form action="{{ route('quality-update') }}" method="post" class="" id="quality_assurance_submit">
                @csrf
                <div class="row">
                    <input type="hidden" name="id" value="{{$quality_assurance->id}}">
                    <input type="hidden" id="id">
                    <div class="col-lg-2 col-md-2 col-6">
                        <div class="form-group">
                            <label for="state">PTILCPR<span class="star" tooltip>*</span></label>
                            <select class="form-select" aria-label="Default select example" name="pt" id="pt">
                                <option value=""> Select </option>
                                <option value='yes'
                                    <?php if($quality_assurance->pt == 'yes'){ echo 'selected'; }else{ echo '';} ?>>Yes
                                </option>
                                <option value='no'
                                    <?php if($quality_assurance->pt == 'no'){ echo 'selected'; }else{ echo '';} ?>>No
                                </option>
                            </select>
                            @error('pt')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6">
                        <div class="form-group">
                            <label for="district">PTPNABL(ISO 17043)<span class="star">*</span></label>
                            <select class="form-select" aria-label="Default select example" name="accredited_pt"
                                id="accredited_pt">
                                <option value=""> Select</option>
                                <option value='yes'
                                    <?php if($quality_assurance->accredited_pt == 'yes'){ echo 'selected'; }else{ echo '';} ?>>
                                    Yes</option>
                                <option value='no'
                                    <?php if($quality_assurance->accredited_pt == 'no'){ echo 'selected'; }else{ echo '';} ?>>
                                    No</option>
                            </select>
                            @error('accredited_pt')
                            <span class="form-text text-muted">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="form-group">
                            <label for="fromYear">LSPTISO 15189/ISO17025</label>
                            <select class="form-select" aria-label="Default select example" name="supervisors_trained"
                                id="supervisors_trained">
                                <option value=""> Select</option>
                                <option value='yes'
                                    <?php if($quality_assurance->supervisors_trained == 'yes'){ echo 'selected'; }else{ echo '';} ?>>
                                    Yes</option>
                                <option value='no'
                                    <?php if($quality_assurance->supervisors_trained == 'no'){ echo 'selected'; }else{ echo '';} ?>>
                                    No</option>
                            </select>
                            <small id="supervisors_trained-error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6">
                        <div class="form-group">
                            <label for="diseasesSyndromes">LIMS available</label>
                            <select class="form-select" name="lims" id="lims">
                                <option value=""> Select</option>
                                <option value='yes'
                                    <?php if($quality_assurance->lims == 'yes'){ echo 'selected'; }else{ echo '';} ?>>
                                    Yes</option>
                                <option value='no'
                                    <?php if($quality_assurance->lims == 'no'){ echo 'selected'; }else{ echo '';} ?>>No
                                </option>
                            </select>
                            <small id="lims-error" class="form-text text-muted"></small>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 search-reset">
                        <div class="apply-filter mt-4 pt-1">
                            <button type="submit" class="btn bg-primary mr-3">Update</button>
                            <button type="reset" class="btn btn-danger w-auto mt-0">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection