@extends('layouts.main')
@section('title')
{{__('Laboratory Dashboard')}}
@endsection
@section('content')
<div class="card-category-1 lab-form-d">
    <div class="row d-flex">
        <div class="col-md-4 mb-4">
            <div class="basic-card basic-card-aqua">

                <div class="card-content">
                    <span class="card-title">General</span>
                    <b><p class="card-text">{{ $GeneralProfileTotal }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('general-laboratory') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="basic-card basic-card-lips">
                <div class="card-content">
                    <span class="card-title">Quality</span>
                    <b><p class="card-text">{{ $QualityAssuranceTotal }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('quality') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="basic-card ">
                <div class="card-content">
                    <span class="card-title">Equipments</span>
                    <b><p class="card-text">{{ $EquipmentsTotal }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('equipments') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="basic-card basic-card-dark">
                <div class="card-content">
                    <span class="card-title">Rabies Test</span>
                    <b><p class="card-text">{{ $RabiesTestTotal }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('rabies-test') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="basic-card basic-card-dark-1">
                <div class="card-content">
                    <span class="card-title">Finance</span>
                    <b><p class="card-text">{{ $ExpenditureTotal }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('expenditure') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>






</div>
</div>
@endsection