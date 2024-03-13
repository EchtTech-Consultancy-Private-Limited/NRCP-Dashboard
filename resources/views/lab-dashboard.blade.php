@extends('layouts.main')
@section('title')
{{__('Lab Dashboard')}}
@endsection
@section('content')
<div class="card-category-1">
    <div class="row d-flex justify-content-center">
        <div class="col">
            <div class="basic-card basic-card-aqua">

                <div class="card-content">
                    <span class="card-title">General</span>
                    <p class="card-text">{{ $GeneralProfileTotal }}.00</p>
                </div>
                <div class="card-link">
                    <a href="{{ route('general-laboratory') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="basic-card basic-card-lips">
                <div class="card-content">
                    <span class="card-title">Quality Assurance</span>
                    <p class="card-text">{{ $QualityAssuranceTotal }}.00</p>
                </div>
                <div class="card-link">
                    <a href="{{ route('quality-assurance') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="basic-card basic-card-light">
                <div class="card-content">
                    <span class="card-title">Equipment</span>
                    <p class="card-text">{{ $EquipmentsTotal }}.00</p>
                </div>
                <div class="card-link">
                    <a href="{{ route('equipment') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="basic-card basic-card-dark">
                <div class="card-content">
                    <span class="card-title">Rabies</span>
                    <p class="card-text">{{ $RabiesTestTotal }}.00</p>
                </div>
                <div class="card-link">
                    <a href="{{ route('rabies-test') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="basic-card basic-card-dark-1">
                <div class="card-content">
                    <span class="card-title">Expenditure</span>
                    <p class="card-text">{{ $ExpenditureTotal }}.00</p>
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