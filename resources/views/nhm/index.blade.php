@extends('layouts.main')
@section("content")
@section('title')
{{__('NHMs')}}
@endsection
<!-- Main content -->
<section class="content sform">
    <div class="container-fluid">
        <div class="panel-body">
            <div>
                <a href="{{ route('nhm.create') }}" class="btn bg-primary text-light float-right m-2">Create NHM</a>
            </div>
            <div class="table nhmDashboard" id="nhm-list">
                <div class="w-100 table-title">
                    State Annual Plan
                </div>
                @if($states)
                @foreach ($states as $state)
                    <div>
                        <a href="{{ route('nhm.view',@$state->id) }}">{{ ucfirst(@$state->state_name) }}</a>
                    </div>
                @endforeach
                @endif               
            </div>
        </div>
    </div>
</section>
@endsection