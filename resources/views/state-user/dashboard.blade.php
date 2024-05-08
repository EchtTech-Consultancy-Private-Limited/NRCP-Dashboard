@extends('layouts.main')
@section('title')
{{ 'NRCP State Dashboard' }}
@endsection
@section('content')
<div class="container-fluid state-user-dashboard">
        <div class="row defaultform justify-content-center">
            <div class="col-md-3">
                <div class="box box1">
                    <span class="user-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </span>
                    <div class="cases">
                        <div class="d-inline-block ml-2">
                            <span id="rabiestext1" class="">Total No. of Investigatation Report </span>
                            </br><span id="rabiesbox1" class="case-title">
                               {{ @$investigateReport }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="box box2">
                    <span class="user-icon">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <!-- <img src=""
                            alt="sample"> -->
                    </span>
                    <div class="cases">
                        <div class="d-inline-block ml-2">
                            <span id="rabietext2" class="">Total No. of State Monthly Report </span>
                            <br><span id="rabiesbox2"
                                class="case-title">{{ @$stateMonthlyReport }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="box box3">
                    <span class="user-icon">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <!-- <img src=""
                            alt="sample"> -->
                    </span>
                    <div class="cases">
                        <div class="d-inline-block ml-2">
                            <span id="rabiestext3" class="">Total No. of Line List Suspected </span>
                            <br><span id="rabiesbox3" class="case-title">
                                {{ @$lineSuspected }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>
           

        </div>
</div>
@endsection
