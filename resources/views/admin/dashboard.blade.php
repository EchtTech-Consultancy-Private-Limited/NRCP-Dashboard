@extends('layouts.main')
@section('title')
{{__('Admin Dashboard')}}
@endsection
@section('content')
<div class="card-category-1 lab-form-d">
    <div class="row d-flex">
        <div class="col-md-4 mb-4">
            <div class="basic-card basic-card-aqua">

                <div class="card-content">
                    <span class="card-title">National User</span>
                    <b><p class="card-text">{{ $users->where('user_type','1')->count() }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('admin.user') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="basic-card basic-card-lips">
                <div class="card-content">
                    <span class="card-title">Laboratory User</span>
                    <b><p class="card-text">{{ $users->where('user_type','2')->count() }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('admin.user') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="basic-card ">
                <div class="card-content">
                    <span class="card-title">State User</span>
                    <b><p class="card-text">{{ $users->where('user_type','3')->count() }}</p></b>
                </div>
                <div class="card-link">
                    <a href="{{ route('admin.user') }}" title="Read Full"><span>Read Full <i
                                class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection