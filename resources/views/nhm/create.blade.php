@extends('layouts.main')
@section("content")
@section('title')
{{__('Create NHM')}}
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
                                    <form action="{{ route('nhm.store') }}" method="post" enctype="multipart/form-data" class="nhm_form">
                                        @csrf
                                        <div class="row bg-c-gray">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="label-title"><b>Create NHM:</b></div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="year">Year<span class="star">*</span></label>
                                                    <select class="form-select p-1 year click-function"
                                                        name="year" aria-label="Default select example"
                                                        id="year" required>
                                                        <option value="" disabled selected year-name="">
                                                            Select Year
                                                        </option>
                                                        <?php
                                                            $currentYear = date('Y');
                                                            for ($year = $currentYear; $year >= 2015; $year--) {
                                                                $selected = $year == 2022 ? '' : '';
                                                                echo "<option value='$year' $selected>$year</option>";
                                                            }
                                                            ?>
                                                    </select>
                                                    @if ($errors->has('year'))
                                                    <span class="text-danger">{{ $errors->first('year') }}</span>
                                                    @endif
                                                    <small id="error-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="id-type">State<span class="star">*</span></label>
                                                    <select class="form-select" aria-label="Default select example"
                                                        name="state" id="state" required>
                                                        <option value="" disabled selected
                                                            institute-name=""> Select state
                                                        </option>
                                                        @foreach ($states as $key => $state)
                                                            <option value="{{ $state->id }}">
                                                                {{ $state->state_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('state'))
                                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                                    @endif
                                                    <small id="state-error"
                                                        class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="identification">ROPs</label>
                                                    <input type="file" class="form-control" name="rops"
                                                        id="rops" aria-describedby="rops">
                                                    @if ($errors->has('rops'))
                                                        <span class="text-danger">{{ $errors->first('rops') }}</span>
                                                    @endif
                                                    <small id="rops-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="identification">Supplementary ROPs</label>
                                                    <input type="file" class="form-control" name="supplementary_rops"
                                                        id="supplementary_rops" aria-describedby="supplementary_rops">
                                                    @if ($errors->has('supplementary_rops'))
                                                    <span class="text-danger">{{ $errors->first('supplementary_rops') }}</span>
                                                    @endif
                                                        <small id="supplementary_rops-error" class="form-text text-muted">
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="button d-flex justify-content-center mt-3">
                                            <button class="btn search-patient-btn mr-3 bg-primary text-light">Submit</button>
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