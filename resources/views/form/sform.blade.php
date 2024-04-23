@extends('layouts.main')
@section("content")
@section('title')
{{__('S Form')}}
@endsection
<!-- Main content -->
<section class="content sform">
    <div class="container-fluid">
        <div class="panel-body bg-white p-0">
            <div class="">
                <form
                    class="form-compact ng-dirty ng-valid-parse ng-valid ng-valid-required ng-valid-pattern ng-valid-maxlength"
                    name="aggform" autocomplete="off">

                    <div class="row bg-c-gray bg-white p-3 pt-4 m-0">

                        <div class="col-md-12 accordian-pform">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <a href="javascript:void();" class="btn btn-link" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                1. S Form (Suspected Cases Form) (Click to View)
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="row m-0">
                                                <div class="col-md-4">
                                                    <div class="form-group "
                                                        ng-show="facilityinfo.health_facility_urban_rural != 2">
                                                        <label for="village" class="labelchange">
                                                            <span class="tooltipid tooltipstered"
                                                                data-placement="right">Village<span>*</span></span>
                                                        </label>
                                                        <select
                                                            class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched"
                                                            id="village"
                                                            ng-required="facilityinfo.health_facility_urban_rural !=2"
                                                            name="village"
                                                            ng-change="getSformUnsubmittedData();getDocumentId();"
                                                            ng-options="v as v.villagename for v in villageSubcenterList  | orderBy:'villagename'"
                                                            required="required">
                                                            <option value="select" class="">-----Select-----</option>
                                                            <option label="Acharapalya" value="object:160">Acharapalya
                                                            </option>
                                                            <option label="Adlapura" value="object:161">Adlapura
                                                            </option>
                                                            <option label="ANTHARASANAHALLI" value="object:162">
                                                                ANTHARASANAHALLI</option>
                                                            <option label="ARALIHALLI" value="object:163">ARALIHALLI
                                                            </option>
                                                            <option label="B G Palya" value="object:164">B G Palya
                                                            </option>
                                                            <option label="Hebbur" value="object:165">Hebbur</option>
                                                            <option label="Heggere" value="object:166">Heggere</option>
                                                            <option label="Hirehalli" value="object:167">Hirehalli
                                                            </option>
                                                            <option label="Kenchenahalli" value="object:168">
                                                                Kenchenahalli</option>
                                                        </select>
                                                        <div class="error"
                                                            ng-show="aggform.village.$dirty &amp;&amp; aggform.village.$invalid">
                                                            <small class="error  "
                                                                ng-show="aggform.village.$error.required">
                                                                Please Select Village</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group col-md-2"
                                                    ng-show="facilityinfo.health_facility_urban_rural === 2">
                                                    <label for="village" class="labelchange">Ward<span>*</span></label>
                                                    <select
                                                        class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required"
                                                        id="ward" ng-required="facilityinfo.health_facility_urban_rural===2" name="ward"
                                                        ng-change="getSformUnsubmittedData();getDocumentId();"
                                                        ng-options="v as v.wardname for v in wardSubcenterList  | orderBy:'wardname'">
                                                        <option value="" class="" selected="selected">-----Select-----
                                                        </option>
                                                    </select>
                                                    <div class="error  ">
                                                        <small class="error  ">
                                                            Please
                                                            Select Ward</small>
                                                    </div>
                                                </div> -->
                                                <div class="form-group col-md-8 d-none"
                                                    ng-show="villageSubcenter || wardSubcenter" id="D-number">
                                                    <label class="labelchange">
                                                        <div class="tooltipid tooltipstered" data-placement="right">
                                                            Document Number:
                                                        </div>
                                                    </label>

                                                    <span class="span-text text-danger mt-0">
                                                        29-548-5537-295485537001-162758-03102023-S-1</span>
                                                </div>
                                            </div>

                                            <div class="col-md-12  d-none" id="data-view">
                                                <table class="table table-condensed table-bordered table-responsive" id="tableId">
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="3"></td>
                                                            <td colspan="7"><b>Number
                                                                    of cases of illness</b>
                                                            </td>
                                                            <td colspan="3" rowspan="2">
                                                                <b> Number of cases of deaths <br> <a href="#headingTwo"
                                                                        ng-click="scrollTo('deathPatientDetailsForm')"
                                                                        class="printhide">[click here to report deaths]
                                                                    </a></b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"><b>Male</b>
                                                            </td>
                                                            <td colspan="3">
                                                                <b>Female</b>
                                                            </td>
                                                            <td rowspan="2"><b>Grand<br>
                                                                    Total
                                                                </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><b> &lt;= 5 Yr</b></td>
                                                            <td><b>&gt; 5 Yr</b></td>
                                                            <td><b>Total</b></td>
                                                            <td><b>&lt;=5 Yr</b></td>
                                                            <td><b>&gt; 5 Yr</b></td>
                                                            <td><b>Total</b></td>
                                                            <td><b>Male</b></td>
                                                            <td><b>Female</b></td>
                                                            <td><b>Total<br>Death</b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt32">
                                                                Only Fever &gt;= 7 days
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt33">
                                                                Only Fever &lt; 7 days
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt20">
                                                                Fever with Rash
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt18">
                                                                Fever with Bleeding
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt19">
                                                                Fever with Altered sensorium
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt50">Cough &lt;= 2 weeks with fever
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt51"> Cough &lt;= 2 weeks without fever
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt14"> Cough &gt; 2 weeks with fever
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt13"> Cough &gt; 2 weeks without fever
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt46"> Loose watery stools with blood &lt; 2 weeks
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt58">Loose watery stools without blood &lt; 2
                                                                weeks
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt52"> Jaundice of &lt; 4 weeks
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt3"> Acute Flaccid Paralysis
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt53"> Malaria Vivax RDT
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt54"> Malaria Falciparum RDT
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt55">Malaria Mixed RDT
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt48">Animal Bite - Snake Bite
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt61"> Animal Bite - Dog Bite
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt5"> Animal Bite - Others
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt84"> Leptospirosis RDT
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                        <tr>
                                                            <td id="tt56">Others
                                                            </td>
                                                            <td><input name="pformcountmale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountmale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control  ">
                                                            </td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                            <td><input name="pformdeathcountfemale" type="text"
                                                                    class="form-control" readonly="readonly"
                                                                    tabindex="-1"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="alert alert-success d-none" role="alert">Data Saved Successfully
                                            </div>
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button
                                                    class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <a href="javascript:void();" class="btn btn-link collapsed"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                2. Reporting Deaths (Click to View)
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <div class="note m-0 mb-3"><i class="fa fa-hand-o-right"
                                                    aria-hidden="true"></i>
                                                Enter Data Accurately and Completely
                                            </div>
                                            <div class="row bg-c-gray m-0">
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="first-name">First Name<span
                                                                class="star">*</span></label>
                                                        <input type="text" name="first_name" id="first-name"
                                                            class="form-control" placeholder="Enter Your First Name"
                                                            maxlength="30" required>
                                                        <small id="first-name-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="middle-name">Middle Name</label>
                                                        <input type="text" name="middle_name" id="middle-name"
                                                            class="form-control" placeholder="Enter Your Middle Name">
                                                        <small id=" " class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="last-name">Last Name<span
                                                                class="star">*</span></label>
                                                        <input type="text" name="last_name" id="last-name"
                                                            class="form-control" maxlength="30" required
                                                            placeholder="Enter Your Last Name">
                                                        <small id="last-name-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <div class="lable-box-text">
                                                            <input type="radio" id="date-b" name="dob" value="date-b"
                                                                checked>
                                                            <label for="date-b" class="mr-5">Date of Birth</label>
                                                            <input type="radio" id="age-b" name="dob" value="age-b">
                                                            <label for="age-b">Age</label>
                                                            <span class="star">*</span>
                                                        </div>

                                                        <input type="date" name="birth_date" id="dob"
                                                            class="form-control" required>

                                                        <div class="date-box d-none" id="Age-inputs">
                                                            <input type="text" name="year" id="year"
                                                                class="form-control mr-2" placeholder="Year" required>
                                                            <input type="text" name="Months" id="Months"
                                                                class="form-control mr-2" placeholder="Months" required>
                                                            <input type="text" name="Days" id="Days"
                                                                class="form-control" placeholder="Days" required>
                                                        </div>

                                                        <small id="dob-eror" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="gander">Gender<span class="star">*</span></label>
                                                        <select class="form-select" name="gender"
                                                            aria-label="Default select example" id="gender" required>
                                                            <option value=""> Select Your Gender</option>
                                                            <option value="1"> Male</option>
                                                            <option value="2"> Famale</option>
                                                            <option value="3"> Other</option>
                                                        </select>
                                                        <small id="gander-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="id-type">Id Type<span class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="id_type" id="id-type" required>
                                                            <option value=""> Select Your id-type
                                                            </option>
                                                            <option value="1"> Male</option>
                                                            <option value="2"> Famale</option>
                                                            <option value="3"> Other</option>
                                                        </select>
                                                        <small id="id-type-error" class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="identification">Identification Number<span
                                                                class="star">*</span></label>
                                                        <input type="text" class="form-control"
                                                            name="identification_number" id="identification"
                                                            aria-describedby="Identification"
                                                            placeholder="Enter Your Identification Number"
                                                            maxlength="12" required>
                                                        <small id="identification-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="label-title"><b>Present Adderess:</b></div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="state">State<span class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="state" id="state" required>
                                                            <option value=""> Select Your state</option>
                                                            <option value="1"> UP</option>
                                                            <option value="2"> MP</option>
                                                            <option value="3"> DL</option>
                                                        </select>
                                                        <small id="state-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="district">District<span
                                                                class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="district" id="district" required>
                                                            <option value=""> Select Your district
                                                            </option>
                                                            <option value="1"> UP</option>
                                                            <option value="2"> MP</option>
                                                            <option value="3"> DL</option>
                                                        </select>
                                                        <small id="district-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="taluka">Sub District<span
                                                                class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="taluka" id="taluka" required>
                                                            <option value=""> Select Your Sub District</option>
                                                            <option value="1"> UP</option>
                                                            <option value="2"> MP</option>
                                                            <option value="3"> DL</option>
                                                        </select>
                                                        <small id="taluka-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="village">Village<span class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="village" id="village" required>
                                                            <option value=""> Select Your village
                                                            </option>
                                                            <option value="1"> UP</option>
                                                            <option value="2"> MP</option>
                                                            <option value="3"> DL</option>
                                                        </select>
                                                        <small id="village-error" class="form-text text-muted"> </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="house-no">House No</label>
                                                        <input type="text" class="form-control" name="house_no"
                                                            id="house-no" aria-describedby="house-no"
                                                            placeholder="Enter Your House No" maxlength="20">
                                                        <small id="house-no-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="street-name">Street Name</label>
                                                        <input type="text" class="form-control" name="street_name"
                                                            id="street-name" aria-describedby="street-name"
                                                            placeholder="Enter Your Street Name" maxlength="40">
                                                        <small id="street-name-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="landmark">Landmark </label>
                                                        <input type="text" class="form-control" name="landmark"
                                                            id="landmark" aria-describedby="landmark"
                                                            placeholder="Enter Your Landmark" maxlength="40">
                                                        <small id="landmark-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-3">
                                                    <div class="form-group">
                                                        <label for="pin-code">PIN Code</label>
                                                        <input type="text" class="form-control" name="Pincode"
                                                            id="pin-code" aria-describedby=" "
                                                            placeholder="Enter Your PIN Code" maxlength="6">
                                                        <small id="pin-code-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row bg-c-gray m-0 mt-4">

                                                <div class="col-lg-12 col-md-12">
                                                    <div class="label-title"><b>3. Death Case Details:</b> </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="provisinal-diagnosis">Probable Cause Of Death<span
                                                                class="star">*</span></label>
                                                        <select class="form-select" aria-label="Default select example"
                                                            name="provisinal_diagnosis" id="provisinal-diagnosis"
                                                            required>
                                                            <option value="" class="" selected="selected">----Select----
                                                            </option>
                                                            <option label="Only Fever >= 7 days" value="">Only Fever
                                                                &gt;= 7 days</option>
                                                            <option label="Only Fever < 7 days" value="">Only Fever &lt;
                                                                7 days</option>
                                                            <option label="Fever with Rash" value="">Fever with Rash
                                                            </option>
                                                            <option label="Fever with Bleeding" value="">Fever with
                                                                Bleeding</option>
                                                            <option label="Fever with Altered sensorium" value="">Fever
                                                                with Altered sensorium</option>
                                                            <option label="Cough <= 2 weeks with fever" value="">Cough
                                                                &lt;= 2 weeks with fever</option>
                                                            <option label="Cough <= 2 weeks without fever" value="">
                                                                Cough &lt;= 2 weeks without fever</option>
                                                            <option label="Cough > 2 weeks with fever" value="">Cough
                                                                &gt; 2 weeks with fever</option>
                                                            <option label="Cough > 2 weeks  without fever" value="">
                                                                Cough &gt; 2 weeks without fever</option>
                                                            <option label="Loose watery stools with blood < 2 weeks"
                                                                value="">Loose watery stools with blood &lt; 2weeks
                                                            </option>
                                                            <option label="Loose watery stools without blood < 2 weeks"
                                                                value="">Loose watery stools without blood&lt; 2 weeks
                                                            </option>
                                                            <option label="Jaundice of < 4 weeks" value="">Jaundice of
                                                                &lt; 4 weeks</option>
                                                            <option label="Acute Flaccid Paralysis" value="">Acute
                                                                Flaccid Paralysis</option>
                                                            <option label="Malaria Vivax RDT" value="">Malaria Vivax RDT
                                                            </option>
                                                            <option label="Malaria  Falciparum RDT" value=""> Malaria
                                                                Falciparum RDT</option>
                                                            <option label="Malaria Mixed RDT" value="">Malaria Mixed RDT
                                                            </option>
                                                            <option label="Animal Bite - Snake Bite" value=""> Animal
                                                                Bite - Snake Bite</option>
                                                            <option label="Animal Bite - Dog Bite" value=""> Animal Bite
                                                                - Dog Bite</option>
                                                            <option label="Animal Bite - Others" value=""> Animal Bite -
                                                                Others</option>
                                                            <option label="Leptospirosis RDT" value=""> Leptospirosis
                                                                RDT</option>
                                                            <option label="Others" value="">Others</option>
                                                        </select>
                                                        <small id="provisinal-diagnosis-error"
                                                            class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="date-of-onset">Date Of Death<span
                                                                class="star">*</span></label>
                                                        <input type="date" name="date_of_onset" class="form-control"
                                                            id="date-of-onset" aria-describedby="Date of Onset"
                                                            placeholder="Enter Your Date of Onset" required>
                                                        <small id="date-of-onset-error" class="form-text text-muted">
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="Remarks">Remarks<span class="star">*</span></label>
                                                        <input type="text" class="form-control" placeholder="Remarks">
                                                        <small id="opd-ipd-error" class="form-text text-muted"> </small>
                                                    </div>
                                                </div>

                                                <div class="button d-flex justify-content-center mt-3 w-100">
                                                    <button
                                                        class="btn search-patient-btn mr-3 bg-primary text-light">save</button>
                                                    <button
                                                        class="btn search-patient-btn bg-danger text-light">Reset</button>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row bg-c-gray bg-white p-0 mt-0">

                        <div class="col-lg-12 col-md-12">
                            <div class="label-title"><b>4. List of Reported Deaths</b> </div>
                        </div>

                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl#</th>
                                        <th>Person Name
                                            <span>
                                                <a class="btn-arrow">
                                                    <span class="fa fa-long-arrow-right printhide arrow-r"></span>
                                                    <span class="fa fa-long-arrow-left printhide arrow-l d-none"></span>
                                                </a>
                                            </span>
                                        </th>
                                        <th class="hide-th">Age </th>
                                        <th class="hide-th">Gender</th>
                                        <th class="hide-th">ID Type/Id No</th>
                                        <th class="hide-th">State</th>
                                        <th class="hide-th">District</th>
                                        <th class="hide-th">Sub District</th>
                                        <th class="hide-th">Village</th>
                                        <th class="hide-th">Address</th>
                                        <th>Probable Cause Of Death</th>
                                        <th>Date of Death</th>
                                        <th>Remark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Manish</td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td class="hide-th"></td>
                                        <td>Dengue (A97)</td>
                                        <td>27/02/2024</td>
                                        <td></td>                                       
                                        <td class="text-nowrap">
                                            <a href="javascript:void();" class="btn bg-danger action-btn"
                                                title="Delete"> <i class="fa fa-trash-o"></i> </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>

                    </div>

                    <div class="button d-flex justify-content-center mt-2 pb-3">
                        <button class="btn search-patient-btn mr-3 bg-primary text-light">Submit</button>
                    </div>

                </form>
            </div>

        </div>
</section>
</div>
@endsection