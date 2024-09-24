@extends('layouts.main')
@section("content")
@section('title')
{{__('Edit NHM')}}
@endsection
<!-- Main content -->
<section class="content sform">
    <div class="container-fluid">
        <div class="panel-body">        
        <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary p-form-card">
                    <div>
                        <a href="{{ route('nhm.index') }}" class="btn bg-primary text-light float-right m-2">Back</a>
                    </div>
                    <div class="form-tab m-0 ">
                        <div class="bootstrap-tab">                           
                            <div class="tab-content" id="myTabContent">
                                    <form action="{{ route('nhm.update',$nhm->id) }}" method="post" enctype="multipart/form-data" class="nhm_form">
                                        @csrf
                                        <div class="row bg-c-gray">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="label-title"><b>Edit NHM:</b></div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 d-flex align-items-baseline">
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="year">Year<span class="star">*</span></label>
                                                        <select class="form-select p-1 year click-function" name="year" aria-label="Default select example" id="year">
                                                            <option value="" disabled selected year-name="">Select Year</option>
                                                            @php
                                                            $currentYear = date('Y');
                                                            $oldYear = $nhm->year; // Retrieve the old value if it exists
                                                            @endphp
                                                            @for($year = $currentYear; $year >= 2015; $year--)
                                                                @php $selected = ($year == $nhm->year) ? 'selected' : ''; @endphp
                                                                <option value='{{ $year }}' {{ $selected }}>{{ $year }}</option>
                                                            @endfor
                                                        </select>
                                                        @if ($errors->has('year'))
                                                        <span class="form-text text-muted">{{ $errors->first('year') }}</span>
                                                        @endif
                                                        <small id="error-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="id-type">State<span class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="state" id="state">
                                                            <option value="" disabled selected
                                                                institute-name=""> Select state
                                                            </option>
                                                            @foreach ($states as $key => $state)
                                                                <option value="{{ $state->id }}" {{ $state->id == $nhm->state_id ? 'selected' : '' }}>
                                                                    {{ $state->state_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('state'))
                                                        <span class="form-text text-muted">{{ $errors->first('state') }}</span>
                                                        @endif
                                                        <small id="state-error"
                                                            class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="identification">ROPs<br><span style="font-size:12px; color: #797979">( jpeg,bmp,png,gif,svg,pdf,zip )</span></label>
                                                        <input type="hidden" value="{{$nhm->rops}}" name="old_rops">
                                                        <input type="file" class="form-control" name="rops" 
                                                            id="rops" aria-describedby="rops">
                                                        @if ($nhm->rops)
                                                        <a class="nhm-file" href="{{ asset('images/uploads/nhm/'.$nhm->rops) }}" download>
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a>
                                                        @endif
                                                        @if ($errors->has('rops'))
                                                            <span class="form-text text-muted">{{ $errors->first('rops') }}</span>
                                                        @endif
                                                        <small id="rops-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="identification">Supplementary ROPs<br><span style="font-size:12px; color: #797979">( jpeg,bmp,png,gif,svg,pdf,zip )</span></label>
                                                        <input type="hidden" value="{{$nhm->supplementary_rops}}" name="old_supplementary_rops">
                                                        <input type="file" class="form-control" name="supplementary_rops"
                                                            id="supplementary_rops" aria-describedby="supplementary_rops">
                                                        @if ($nhm->supplementary_rops)
                                                        <a class="nhm-file" href="{{ asset('images/uploads/nhm/'.$nhm->supplementary_rops) }}" download>
                                                            <i class="fa fa-download" aria-hidden="true"></i>
                                                        </a>
                                                        @endif
                                                        @if ($errors->has('supplementary_rops'))
                                                        <span class="form-text text-muted">{{ $errors->first('supplementary_rops') }}</span>
                                                        @endif
                                                            <small id="supplementary_rops-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button d-flex justify-content-center mt-3">
                                            <button class="btn search-patient-btn mr-3 bg-primary text-light">Update</button>
                                            <button type="reset" class="btn bg-danger me-3 search-patient-btn">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection