@include('includes.header')

<link rel="stylesheet" href="{{ asset('assets/pform_css/style.css') }}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="logo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        @include('includes.navigation')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('assets/login/dist/img/AdminLTELogo.png') }}" alt="Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">NRCP Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('includes.sidebar')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!--            <h1 class="m-0">Dashboard</h1>-->
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="panel-body">
                        <div class="">
                            <form
                                class="form-compact ng-dirty ng-valid-parse ng-valid ng-valid-required ng-valid-pattern ng-valid-maxlength"
                                name="aggform" autocomplete="off">

                                <!--Village Drop Down -->
                                <div class="row">
                                    <div class="form-group col-xs-4"
                                        ng-show="facilityinfo.health_facility_urban_rural != 2">
                                        <label for="village" class="labelchange"><span class="tooltipid tooltipstered"
                                                data-placement="right">Village<span
                                                    style="color: red">*</span></span></label>
                                        <select
                                            class="form-control ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required ng-touched"
                                            id="village" ng-model="villageSubcenter"
                                            ng-required="facilityinfo.health_facility_urban_rural != 2" name="village"
                                            ng-change="getSformUnsubmittedData();getDocumentId();"
                                            ng-options="v as v.villagename for v in villageSubcenterList  | orderBy:'villagename'"
                                            required="required">
                                            <option value="" class="">-----Select-----</option>
                                            <option label="Acharapalya" value="object:160">Acharapalya</option>
                                            <option label="Adlapura" value="object:161">Adlapura</option>
                                            <option label="ANTHARASANAHALLI" value="object:162">ANTHARASANAHALLI
                                            </option>
                                            <option label="ARALIHALLI" value="object:163">ARALIHALLI</option>
                                            <option label="B G Palya" value="object:164">B G Palya</option>
                                            <option label="Hebbur" value="object:165">Hebbur</option>
                                            <option label="Heggere" value="object:166">Heggere</option>
                                            <option label="Hirehalli" value="object:167">Hirehalli</option>
                                            <option label="Kenchenahalli" value="object:168">Kenchenahalli</option>
                                        </select>
                                        <div class="error ng-hide"
                                            ng-show="aggform.village.$dirty &amp;&amp; aggform.village.$invalid">
                                            <small class="error ng-hide" style="color: red;"
                                                ng-show="aggform.village.$error.required">
                                                Please
                                                Select Village</small>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-2 ng-hide"
                                        ng-show="facilityinfo.health_facility_urban_rural === 2">
                                        <label for="village" class="labelchange">Ward<span
                                                style="color: red">*</span></label>

                                        <select
                                            class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required"
                                            id="ward" ng-model="wardSubcenter"
                                            ng-required="facilityinfo.health_facility_urban_rural === 2" name="ward"
                                            ng-change="getSformUnsubmittedData();getDocumentId();"
                                            ng-options="v as v.wardname for v in wardSubcenterList  | orderBy:'wardname'">
                                            <option value="" class="" selected="selected">-----Select-----</option>
                                        </select>
                                        <div class="error ng-hide"
                                            ng-show="aggform.ward.$dirty &amp;&amp; aggform.ward.$invalid">
                                            <small class="error ng-hide" style="color: red;"
                                                ng-show="aggform.ward.$error.required">
                                                Please
                                                Select Ward</small>
                                        </div>

                                    </div>


                                    <div class="form-group col-xs-8" ng-show="villageSubcenter || wardSubcenter">
                                        <label class="labelchange"><span class="tooltipid tooltipstered"
                                                data-placement="right">
                                                Document Number:</span></label><br> <span
                                            style="font-size: medium; color: #FF5733;" class="ng-binding">
                                            29-548-5537-295485537001-162758-03102023-S-1</span>
                                    </div>
                                    <div class="row ng-hide" ng-show="facilitynp">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger" role="alert">There
                                                seems to be some server issue. Please login again or contact
                                                helpdesk.</div>
                                        </div>
                                    </div>

                                </div>




                                <div class="table-responsive">


                                    <table class="table table-condensed table-bordered" id="tableId">
                                        <tbody>
                                            <tr>
                                                <td rowspan="3"></td>
                                                <td colspan="7" style="text-align: center; font-size: 14px;"><b>Number
                                                        of cases of illness</b></td>
                                                <td colspan="3" rowspan="2" style="text-align: center; width: 20px"><b
                                                        style="color: red;">Number of cases of deaths <br> <a href=""
                                                            ng-click="scrollTo('deathPatientDetailsForm')"
                                                            class="printhide">[click here
                                                            to report deaths] </a></b></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: center; font-size: 14px;"><b>Male</b>
                                                </td>
                                                <td colspan="3" style="text-align: center; font-size: 14px;">
                                                    <b>Female</b>
                                                </td>
                                                <td rowspan="2" style="text-align: center;"><b>Grand<br>
                                                        Total
                                                    </b></td>

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
                                                <td><b>Total<br>Death
                                                    </b></td>
                                            </tr>

                                            <td style="width: 470px;" id="tt32" class="ng-binding">2.1.1
                                                Only Fever &gt;= 7 days</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt33" class="ng-binding">2.1.2
                                                Only Fever &lt; 7 days</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt20" class="ng-binding">2.1.3
                                                Fever with Rash</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt18" class="ng-binding">2.1.4
                                                Fever with Bleeding</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt19" class="ng-binding">2.1.5
                                                Fever with Altered sensorium</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt50" class="ng-binding">2.2.1
                                                Cough &lt;= 2 weeks with fever</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt51" class="ng-binding">2.2.2
                                                Cough &lt;= 2 weeks without fever</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt14" class="ng-binding">2.2.3
                                                Cough &gt; 2 weeks with fever</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt13" class="ng-binding">2.2.4
                                                Cough &gt; 2 weeks without fever</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt46" class="ng-binding">2.3.1
                                                Loose watery stools with blood &lt; 2 weeks</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt58" class="ng-binding">2.3.2
                                                Loose watery stools without blood &lt; 2 weeks</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt52" class="ng-binding">2.4.1
                                                Jaundice of &lt; 4 weeks</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt3" class="ng-binding">2.5.1
                                                Acute Flaccid Paralysis</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt53" class="ng-binding">2.6.1
                                                Malaria Vivax RDT</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt54" class="ng-binding">2.6.2
                                                Malaria Falciparum RDT</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt55" class="ng-binding">2.6.3
                                                Malaria Mixed RDT</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt48" class="ng-binding">2.7.1
                                                Animal Bite - Snake Bite</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt61" class="ng-binding">2.7.2
                                                Animal Bite - Dog Bite</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt5" class="ng-binding">2.7.4
                                                Animal Bite - Others</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt84" class="ng-binding">2.7.5
                                                Leptospirosis RDT</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            <td style="width: 470px;" id="tt56" class="ng-binding">2.14.1
                                                Others</td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountmale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalelt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value=" ((s.name == 'Unknown')&amp;&amp;(s.casesmalelt5yr == 0)  ?'':s.casesmalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input name="pformcountfemale"
                                                    ng-pattern="/^[0-9]+$/" ng-model="s.casesmalegt5yr"
                                                    ng-change="maleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmalegt5yr == 0)  ?'':s.casesmalegt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountmale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesmaletotal == 0 ) ?'':s.casesmaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalelt5yr" ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)"
                                                    ng-value="(( s.name == 'Unknown')&amp;&amp;(s.casesfemalelt5yr == 0)  ?'':s.casesfemalelt5yr)"
                                                    ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemalegt5yr"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemalegt5yr == 0)  ?'':s.casesfemalegt5yr)"
                                                    ng-change="femaleData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern ng-valid-maxlength"
                                                    ng-keydown="NaN_Fun($event)" ng-readonly="(s.name == 'Unknown')"
                                                    style="min-width: 40px; max-width: 60px" maxlength="2"></td>


                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesfemaletotal == 0)  ?'': s.casesfemaletotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.casesgrandtotal" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly"
                                                    ng-value="((s.name == 'Unknown')&amp;&amp;(s.casesgrandtotal == 0)  ?'': s.casesgrandtotal)"
                                                    style="min-width: 40px; max-width: 60px" tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathmaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathfemaletotal" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>

                                            <td style="min-width: 40px; max-width: 60px"><input
                                                    name="pformdeathcountfemale" ng-pattern="/^[0-9]+$/"
                                                    ng-model="s.deathcases" ng-change="totalData(s)" type="text"
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                    readonly="readonly" style="min-width: 40px; max-width: 60px"
                                                    tabindex="-1"></td>
                                            </tr>
                                            < </tbody>
                                    </table>
                                </div>

                                <div class="alert alert-success ng-hide" style="margin-top: 5px" ng-show="surDataSaved"
                                    role="alert">
                                    Data Saved
                                    Successfully</div>
                                <button ng-disabled="aggform.$invalid" class="btn btn-primary printhide"
                                    ng-click="SurviellanceDataSave()" style="margin: 5px;">
                                    <span class="tooltipid tooltipstered" data-placement="right">Save</span></button>
                            </form>
                        </div>

                        <div>

                            <!-- Aggregation Summary Display Table -->
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="aggregationSummary1">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                data-target="#aggregationSummary" aria-expanded="true"
                                                aria-controls="collapseOne"> <span
                                                    style="margin-top: 0px; font-size: 13px; font-weight: bold; opacity: 1;"
                                                    class="tooltipid tooltipstered" data-placement="right">
                                                    1. S Form (Suspected Cases Form) <span class="printhide">(Click
                                                        to View)</span>
                                                </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="aggregationSummary" class="panel-collapse collapse in" role="tabpanel"
                                        aria-labelledby="aggregationSummary1" aria-expanded="true" style="">
                                        <div class="panel-body">
                                            <form class="form-compact ng-pristine ng-invalid ng-invalid-required"
                                                name="aggform" autocomplete="off">

                                                <!--Village Drop Down -->
                                                <div class="row">
                                                    <div class="form-group col-xs-4"
                                                        ng-show="facilityinfo.health_facility_urban_rural != 2">
                                                        <label for="village" class="labelchange"><span
                                                                class="tooltipid tooltipstered"
                                                                data-placement="right">Village<span
                                                                    style="color: red">*</span></span></label>
                                                        <select
                                                            class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                            id="village" ng-model="villageSubcenter"
                                                            ng-required="facilityinfo.health_facility_urban_rural != 2"
                                                            name="village"
                                                            ng-change="getSformUnsubmittedData();getDocumentId();"
                                                            ng-options="v as v.villagename for v in villageSubcenterList  | orderBy:'villagename'"
                                                            required="required">
                                                            <option value="" class="" selected="selected">
                                                                -----Select-----
                                                            </option>
                                                            <option label="Acharapalya" value="object:19">Acharapalya
                                                            </option>
                                                            <option label="Adlapura" value="object:20">Adlapura</option>
                                                            <option label="ANTHARASANAHALLI" value="object:21">
                                                                ANTHARASANAHALLI</option>
                                                            <option label="ARALIHALLI" value="object:22">ARALIHALLI
                                                            </option>
                                                            <option label="B G Palya" value="object:23">B G Palya
                                                            </option>
                                                            <option label="Hebbur" value="object:24">Hebbur</option>
                                                            <option label="Heggere" value="object:25">Heggere</option>
                                                            <option label="Hirehalli" value="object:26">Hirehalli
                                                            </option>
                                                            <option label="Kenchenahalli" value="object:27">
                                                                Kenchenahalli
                                                            </option>
                                                        </select>
                                                        <div class="error ng-hide"
                                                            ng-show="aggform.village.$dirty &amp;&amp; aggform.village.$invalid">
                                                            <small class="error" style="color: red;"
                                                                ng-show="aggform.village.$error.required"> Please
                                                                Select Village</small>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-xs-2 ng-hide"
                                                        ng-show="facilityinfo.health_facility_urban_rural === 2">
                                                        <label for="village" class="labelchange">Ward<span
                                                                style="color: red">*</span></label>

                                                        <select
                                                            class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required"
                                                            id="ward" ng-model="wardSubcenter"
                                                            ng-required="facilityinfo.health_facility_urban_rural === 2"
                                                            name="ward"
                                                            ng-change="getSformUnsubmittedData();getDocumentId();"
                                                            ng-options="v as v.wardname for v in wardSubcenterList  | orderBy:'wardname'">
                                                            <option value="" class="" selected="selected">
                                                                -----Select-----
                                                            </option>
                                                        </select>
                                                        <div class="error ng-hide"
                                                            ng-show="aggform.ward.$dirty &amp;&amp; aggform.ward.$invalid">
                                                            <small class="error ng-hide" style="color: red;"
                                                                ng-show="aggform.ward.$error.required"> Please
                                                                Select Ward</small>
                                                        </div>

                                                        <!-- <input class="form-control"
											id="village" ng-model="healthfacward.wardname"
											ng-required="hasRole('HFUSCUSER')" name="village"
											readonly="true">

										<div class="error"
											ng-show="aggform.village.$dirty &amp;&amp; aggform.village.$invalid">
											<small class="error" style="color: red;"
												ng-show="aggform.village.$error.required"> Please
												Select Village</small>
										</div> -->
                                                    </div>

                                                    <!-- <div class="form-group col-xs-2" ng-show="hasRole('HFSCUSER')">
										<label for="village" class="labelchange">Area<span
											style="color: red">*</span></label> <select class="form-control"
											id="village" ng-model="wardspecificarea"
											ng-required="hasRole('HFUSCUSER')" name="village"
											ng-change="getSformUnsubmittedData()"
											ng-options="m as m.areaname for m in areaListmain  | orderBy:'areaname'">
											<option value="">-----Select-----</option>
										</select>
										<div class="error"
											ng-show="aggform.village.$dirty &amp;&amp; aggform.village.$invalid">
											<small class="error" style="color: red;"
												ng-show="aggform.village.$error.required"> Please
												Select Village</small>
										</div>
									</div> -->

                                                    <div class="form-group col-xs-8 ng-hide"
                                                        ng-show="villageSubcenter || wardSubcenter">
                                                        <label class="labelchange"><span class="tooltipid tooltipstered"
                                                                data-placement="right">
                                                                Document Number:</span></label><br> <span
                                                            style="font-size: medium; color: #FF5733;"
                                                            class="ng-binding">
                                                        </span>
                                                    </div>
                                                    <div class="row ng-hide" ng-show="facilitynp">
                                                        <div class="col-xs-12">
                                                            <div class="alert alert-danger" role="alert">There
                                                                seems to be some server issue. Please login again or
                                                                contact
                                                                helpdesk.</div>
                                                        </div>
                                                    </div>

                                                </div>




                                                <div class="table-responsive ng-hide">
                                                    <table class="table table-condensed table-bordered" id="tableId">
                                                        <tbody>
                                                            <tr>
                                                                <td rowspan="3"></td>
                                                                <td colspan="7"
                                                                    style="text-align: center; font-size: 14px;">
                                                                    <b>Number
                                                                        of cases of illness</b></td>
                                                                <td colspan="3" rowspan="2"
                                                                    style="text-align: center; width: 20px"><b
                                                                        style="color: red;">Number of cases of deaths
                                                                        <br>
                                                                        <a href=""
                                                                            ng-click="scrollTo('deathPatientDetailsForm')"
                                                                            class="printhide">[click here to report
                                                                            deaths]
                                                                        </a></b></td>

                                                            </tr>
                                                            <tr>
                                                                <td colspan="3"
                                                                    style="text-align: center; font-size: 14px;">
                                                                    <b>Male</b>
                                                                </td>
                                                                <td colspan="3"
                                                                    style="text-align: center; font-size: 14px;">
                                                                    <b>Female</b>
                                                                </td>
                                                                <td rowspan="2" style="text-align: center;"><b>Grand<br>
                                                                        Total
                                                                    </b></td>

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
                                                                <td><b>Total<br>Death
                                                                    </b></td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="alert alert-success ng-hide" style="margin-top: 5px"
                                                    ng-show="surDataSaved" role="alert">Data Saved
                                                    Successfully</div>
                                                <button ng-disabled="aggform.$invalid" class="btn btn-primary printhide"
                                                    ng-click="SurviellanceDataSave()" style="margin: 5px;"
                                                    disabled="disabled">
                                                    <span class="tooltipid tooltipstered"
                                                        data-placement="right">Save</span></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- Death Patient Details Form  -->
                        <div id="deathPatientDetailsForm"></div>
                        <div id="target">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="DeathPatientformId1">
                                        <h4 class="panel-title">
                                            <a role="button" data-toggle="collapse" data-parent="#accordion"
                                                data-target="#DeathPatientformId" aria-expanded="true"
                                                aria-controls="collapseOne"> <span
                                                    style="font-size: 13px; font-weight: bold;"
                                                    class="tooltipid tooltipstered" data-placement="right">2. Reporting
                                                    Deaths (Click to View)</span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="DeathPatientformId" class="panel-collapse collapse in" role="tabpanel"
                                        aria-labelledby="DeathPatientformId1" aria-expanded="true" style="">
                                        <div class="panel-body">
                                            <div class="row"
                                                style="margin-left: px; padding-left: 8px; padding-right: 2px;">
                                                <div class="col-xs-12">
                                                    <div style="color: red; font-weight: bold;">
                                                        <span
                                                            class="glyphicon glyphicon-hand-right"></span>&nbsp;&nbsp;&nbsp;Enter
                                                        data accurately and completely
                                                    </div>
                                                </div>
                                            </div>

                                            <form name="deathcaseform" novalidate=""
                                                class="form-compact ng-pristine ng-invalid ng-invalid-required ng-valid-pattern ng-valid-maxlength"
                                                autocomplete="off">
                                                <fieldset style="background-color: aliceblue;">
                                                    <div class="row">
                                                        <label for="mobileno" class="col-xs-2 control-label"
                                                            style="margin-top: 5px; max-width: 123px;"><span
                                                                class="tooltipid tooltipstered"
                                                                data-placement="right">Name:</span> </label>

                                                        <div class="form-group col-xs-2">
                                                            <label for="firstname" class="labelchange">2.2. First
                                                                Name<span style="color: red">*</span>
                                                            </label> <input
                                                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"
                                                                id="firstname" name="firstname"
                                                                ng-model="patient.patient_first_name" type="text"
                                                                ng-required="true" ng-pattern="/^[a-zA-Z'.,-]{0,150}$/"
                                                                required="required">
                                                            <div class="error ng-hide"
                                                                ng-show=" deathcaseform.firstname.$dirty &amp;&amp;  deathcaseform.firstname.$invalid">
                                                                <small
                                                                    ng-show=" deathcaseform.firstname.$error.required">
                                                                    Please Enter Name. </small> <small
                                                                    class="error ng-hide" style="color: red;"
                                                                    ng-show=" deathcaseform.firstname.$error.pattern">
                                                                    Please Enter Valid First Name. </small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-xs-2">
                                                            <label for="middlename" class="labelchange"
                                                                style="min-width: 103px">2.3. Middle
                                                                Name</label> <input
                                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                                id="middlename" name="middlename"
                                                                ng-pattern="/^[a-zA-Z'.,-]{0,150}$/"
                                                                ng-model="patient.patient_middle_name" type="text">
                                                            <div class="error ng-hide"
                                                                ng-show=" deathcaseform.middlename.$dirty &amp;&amp;  deathcaseform.middlename.$invalid">
                                                                <small class="error ng-hide" style="color: red;"
                                                                    ng-show=" deathcaseform.middlename.$error.pattern">
                                                                    Please Enter Valid Middle Name. </small>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-xs-2">
                                                            <label for="lastname" class="labelchange">2.4. Last
                                                                Name</label> <input
                                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-pattern"
                                                                id="lastname" name="lastname"
                                                                ng-pattern="/^[a-zA-Z'.,-]{0,150}$/"
                                                                ng-model="patient.patient_last_name" type="text">
                                                            <div class="error ng-hide"
                                                                ng-show=" deathcaseform.lastname.$dirty &amp;&amp;  deathcaseform.lastname.$invalid">
                                                                <small class="error ng-hide" style="color: red;"
                                                                    ng-show=" deathcaseform.lastname.$error.pattern">
                                                                    Please Enter Valid Last Name. </small>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-xs-4" style="margin-bottom: 0px;">
                                                            <label class="radio-inline" style="font-weight: 700;">
                                                                <input type="radio" ng-model="agedob" name="agedob"
                                                                    id="inlineRadio2" value="dob"
                                                                    ng-click="clearfield('dob')"
                                                                    class="ng-pristine ng-untouched ng-valid ng-not-empty">
                                                                <span class="tooltipid tooltipstered"
                                                                    data-placement="right">
                                                                    2.5. Date Of Birth</span><span
                                                                    ng-show="agedob=='dob'" style="color: red;">*</span>
                                                            </label> <label class="radio-inline"
                                                                style="font-weight: 700;">
                                                                <input type="radio" name="agedob" ng-model="agedob"
                                                                    id="inlineRadio1" value="age"
                                                                    ng-click="clearfield('age')"
                                                                    class="ng-pristine ng-untouched ng-valid ng-not-empty">
                                                                <span class="tooltipid tooltipstered"
                                                                    data-placement="right">
                                                                    2.6. Age</span> <span ng-show="agedob=='age'"
                                                                    style="color: red;" class="ng-hide">*</span>
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-xs-2" ng-show="agedob=='dob'">


                                                            <!-- <label for="dateofbirth" class="labelchange">Date of
								Birth<span style="color: red">*</span>
							</label> -->
                                                            <div class="input-group input-append date ageclass"
                                                                data-provide="datepicker">
                                                                <input type="text"
                                                                    class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"
                                                                    name="dateofbirth" placeholder="dd/mm/yyyy"
                                                                    ng-readonly="precordreadonly"
                                                                    ng-pattern="/^(31[ \/ ](0[13578]|1[02])[ \/ ](18|19|20)[0-9]{2})|((29|30)[\/](01|0[3-9]|1[0-2])[\/](18|19|20)[0-9]{2})|((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[0-2])[\/](18|19|20)[0-9]{2})|(29[\/](02)[\/](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000))$/"
                                                                    ng-model="patient.dateofbirth"
                                                                    ng-required="agedob=='dob'"
                                                                    ng-change="checkDateValidation(patient.dateofdeath,patient.dateofbirth,'insert'); validate_DOB_DOD(patient.dateofbirth,'dobmain');"
                                                                    ng-blur="validate_DOB_DOD(patient.dateofbirth,'dobmain');"
                                                                    style="min-width: 80px" required="required"> <span
                                                                    class="input-group-addon datepicker"
                                                                    style="padding: 2px 12px;"> <span
                                                                        class="glyphicon glyphicon-calendar"></span>
                                                                </span>
                                                            </div>
                                                            <div class="error ng-hide"
                                                                ng-show="deathcaseform.dateofbirth.$dirty &amp;&amp; deathcaseform.dateofbirth.$invalid">
                                                                <small class="error" style="color: red;"
                                                                    ng-show="deathcaseform.dateofbirth.$error.required">
                                                                    Please Enter Date of Birth.</small> <small
                                                                    class="error ng-hide" style="color: red;"
                                                                    ng-show="deathcaseform.dateofbirth.$error.pattern">
                                                                    Please enter valid date in dd/mm/yyyy format
                                                                    .</small>
                                                            </div>
                                                            <div ng-show="showdoberror" class="ng-hide">
                                                                <small class="error"> Date of Birth can not be
                                                                    earlier than 01/01/1900 and can not beyond todays
                                                                    date.
                                                                </small>
                                                            </div>

                                                        </div>
                                                        <!-- ngIf: agedob=='age' -->
                                                    </div>


                                                    <!-- <div class="form-group col-xs-2">
											<label for="dateofbirth" class="labelchange">Date of
												Birth<span style="color: red">*</span>
											</label>
											<div class='input-group input-append date ageclass'
												data-provide="datepicker">
												<input type='text' class="form-control" name="dateofbirth"
													ng-model="patient.dateofbirth" ng-required="true"
													placeholder="dd/mm/yyyy" style="min-width: 80px;"
													ng-blur="checkDateValidation(patient.dateofdeath,patient.dateofbirth,'insert'); validate_DOB_DOD(patient.dateofbirth,'dobmain');"
													ng-change="checkDateValidation(patient.dateofdeath,patient.dateofbirth,'insert'); validate_DOB_DOD(patient.dateofbirth,'dobmain');"
													ng-pattern='/^(31[ \/ ](0[13578]|1[02])[ \/ ](18|19|20)[0-9]{2})|((29|30)[\/](01|0[3-9]|1[1-2])[\/](18|19|20)[0-9]{2})|((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[0-2])[\/](18|19|20)[0-9]{2})|(29[\/](02)[\/](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000))$/'>
												<span class="input-group-addon datepicker"
													style="padding: 2px 12px;"> <span
													class="glyphicon glyphicon-calendar"></span>
												</span>
											</div>
											<div class="error"
												ng-show="deathcaseform.dateofbirth.$dirty &amp;&amp; deathcaseform.dateofbirth.$invalid">
												<small class="error" style="color: red;"
													ng-show="deathcaseform.dateofbirth.$error.required">
													Please Select Date of Birth.</small> <small class="error"
													style="color: red;"
													ng-show="deathcaseform.dateofbirth.$error.pattern">
													Please Enter valid date in dd/mm/yyyy format.</small>
											</div>
											<small class="error" style="color: red;"
												ng-show="showDateError"> Date Of Birth should be
												smaller than Date Of death.</small>

											<div ng-show="showdoberror">
												<small class="error"> Date of Birth can not be
													earlier than 01/01/1900 and can not beyond todays date. </small>
											</div>
										</div> -->


                                                    <!-- <div class="form-group col-xs-2">
		



                                                <div class="row">
                                                    <label class="col-xs-2 control-label"
                                                        style="margin-top: 5px; max-width: 123px;">
                                                        <span class="tooltipid tooltipstered" data-placement="right">
                                                            2.7.
                                                            Gender:</span><span style="color: red">*</span>
                                                    </label>


                                                    <div class="form-group col-xs-5">
                                                        <!-- ngRepeat: g in genderlist -->
                                                    <div ng-repeat="g in genderlist" class="ng-scope">
                                                        <div class="form-group col-xs-3">
                                                            <div class="radio">
                                                                <label class="ng-binding"><input ng-required="true"
                                                                        ng-model="patient.sex" type="radio"
                                                                        name="optradio" ng-value="g"
                                                                        class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                                        value="[object Object]"
                                                                        required="required">Male</label>
                                                            </div>
                                                            <div class="error ng-hide"
                                                                ng-show="ncaseform.sex.$dirty &amp;&amp; ncaseform.sex.$invalid">
                                                                <small class="error ng-hide" style="color: red;"
                                                                    ng-show="ncaseform.age.$error.required"> Please
                                                                    Enter Sex. </small>
                                                            </div>
                                                        </div>
                                                    </div><!-- end ngRepeat: g in genderlist -->
                                                    <div ng-repeat="g in genderlist" class="ng-scope">
                                                        <div class="form-group col-xs-3">
                                                            <div class="radio">
                                                                <label class="ng-binding"><input ng-required="true"
                                                                        ng-model="patient.sex" type="radio"
                                                                        name="optradio" ng-value="g"
                                                                        class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                                        value="[object Object]"
                                                                        required="required">Female</label>
                                                            </div>
                                                            <div class="error ng-hide"
                                                                ng-show="ncaseform.sex.$dirty &amp;&amp; ncaseform.sex.$invalid">
                                                                <small class="error ng-hide" style="color: red;"
                                                                    ng-show="ncaseform.age.$error.required"> Please
                                                                    Enter Sex. </small>
                                                            </div>
                                                        </div>
                                                    </div><!-- end ngRepeat: g in genderlist -->
                                                    <div ng-repeat="g in genderlist" class="ng-scope">
                                                        <div class="form-group col-xs-3">
                                                            <div class="radio">
                                                                <label class="ng-binding"><input ng-required="true"
                                                                        ng-model="patient.sex" type="radio"
                                                                        name="optradio" ng-value="g"
                                                                        class="ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                                        value="[object Object]"
                                                                        required="required">Transgender</label>
                                                            </div>
                                                            <div class="error ng-hide"
                                                                ng-show="ncaseform.sex.$dirty &amp;&amp; ncaseform.sex.$invalid">
                                                                <small class="error ng-hide" style="color: red;"
                                                                    ng-show="ncaseform.age.$error.required"> Please
                                                                    Enter Sex. </small>
                                                            </div>
                                                        </div>
                                                    </div><!-- end ngRepeat: g in genderlist -->
                                        </div>


                                        <div class="form-group col-xs-2">
                                            <label for="identityType" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.8. ID
                                                    Type</span><span style="color: red">*</span>
                                            </label> <select
                                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                id="identityType" ng-model="patient.identityType" ng-required="true"
                                                name="identityType" ng-change="IdlableChange(patient,'main')"
                                                ng-options="g as g.patientidtype for g in idtypelist | orderBy:'displayorder'"
                                                required="required">
                                                <option value="" class="" selected="selected">
                                                    -----Select-----</option>
                                                <option label="Not Available" value="object:28">Not
                                                    Available</option>
                                                <option label="Aadhaar" value="object:29">Aadhaar</option>
                                                <option label="VoterID" value="object:30">VoterID</option>
                                                <option label="PAN" value="object:31">PAN</option>
                                                <option label="Passport" value="object:32">Passport</option>
                                                <option label="Driving License" value="object:33">Driving
                                                    License</option>
                                                <option label="National Health ID" value="object:34">
                                                    National Health ID
                                                </option>
                                                <option label="State Health ID" value="object:35">State
                                                    Health ID</option>
                                                <option label="EHR ID" value="object:36">EHR ID</option>
                                                <option label="Ration/PDS Photo Card" value="object:37">
                                                    Ration/PDS Photo
                                                    Card</option>
                                                <option label="Government Photo ID Cards" value="object:38">
                                                    Government Photo
                                                    ID Cards</option>
                                                <option label="NREGS Job Card" value="object:39">NREGS Job
                                                    Card</option>
                                                <option label="Photo ID issued by Recognized Educational Institution"
                                                    value="object:40">Photo ID issued by Recognized
                                                    Educational Institution
                                                </option>
                                                <option label="Arms License" value="object:41">Arms License
                                                </option>
                                                <option label="Photo Bank ATM Card" value="object:42">Photo
                                                    Bank ATM Card
                                                </option>
                                                <option label="Photo Credit Card" value="object:43">Photo
                                                    Credit Card
                                                </option>
                                                <option label="Pensioner Photo Card" value="object:44">
                                                    Pensioner Photo Card
                                                </option>
                                                <option label="Freedom Fighter Photo Card" value="object:45">Freedom
                                                    Fighter
                                                    Photo Card</option>
                                                <option label="Kissan Photo Passbook" value="object:46">
                                                    Kissan Photo
                                                    Passbook</option>
                                                <option label="CGHS / ECHS Photo Card" value="object:47">
                                                    CGHS / ECHS Photo
                                                    Card</option>
                                                <option
                                                    label="Address Card having Name and Photo issued by Department of Posts  "
                                                    value="object:48">Address Card having Name and Photo
                                                    issued by
                                                    Department of Posts </option>
                                                <option
                                                    label="Certificate of Identity having photo issued by Group A Gazetted Officer on letterhead"
                                                    value="object:49">Certificate of Identity having photo
                                                    issued by Group A
                                                    Gazetted Officer on letterhead</option>
                                                <option label="ABHA" value="object:50">ABHA</option>
                                                <option label="Others" value="object:51">Others</option>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show=" deathcaseform.identityType.$dirty &amp;&amp;  deathcaseform.identityType.$invalid">
                                                <small class="error" style="color: red;"
                                                    ng-show=" deathcaseform.identityType.$error.required">
                                                    Please Select Id Type. </small>
                                            </div>

                                        </div>
                                        <div class="form-group col-xs-2 ng-hide"
                                            ng-show="patient.identityType.patientidtype === 'Others'">
                                            <label for="other" class="labelchange" style="min-width: 140px">2.9. Other
                                                Id
                                                type<span style="color: red">*</span></label> <input
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required"
                                                style="min-width: 140px" id="other" type="text"
                                                ng-model="patient.otherIdType"
                                                ng-required="patient.identityType.patientidtype === 'Others'"
                                                name="other">
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.other.$dirty &amp;&amp; deathcaseform.other.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.other.$error.required"> Please
                                                    Enter Identification Number Type. </small>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-2"
                                            ng-show="patient.identityType.patientidtype !== 'Not Available'">
                                            <label for="patientidnumber" class="labelchange"
                                                style="min-width: 160px"><span
                                                    class="tooltipid ng-binding tooltipstered" data-placement="right">
                                                    2.10. Identification Number</span><span
                                                    style="color: red">*</span></label> <input
                                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                id="patientidnumber" type="text" style="min-width: 140px"
                                                ng-model="patient.patient_id_card_number"
                                                ng-required="patient.identityType.patientidtype !== 'Not Available'"
                                                ng-blur="getPDbyIdType(patient,'main')" name="patientidnumber"
                                                required="required">
                                            <div class="error ng-hide"
                                                ng-show=" deathcaseform.patientidnumber.$dirty &amp;&amp;  deathcaseform.patientidnumber.$invalid">
                                                <small class="error" style="color: red;"
                                                    ng-show=" deathcaseform.patientidnumber.$error.required">
                                                    Please Enter Identification Number. </small>
                                            </div>
                                            <small class="error ng-hide" style="color: red;" ng-show="iderror">
                                                Please Enter valid Identification Number. </small>
                                        </div>

                                        <!-- <div class="form-group col-xs-2">
										<label for="sex" class="labelchange">Sex<span
											style="color: red">*</span></label> <select class="form-control"
											id="sex" ng-model="patient.sex" name="sex" ng-required="true"
											ng-options="g as g.gender for g in genderlist  | orderBy:'gender'">
											<option value="">-----Select-----</option>
										</select>
										<div class="error"
											ng-show=" deathcaseform.sex.$dirty &amp;&amp;  deathcaseform.sex.$invalid">
											<small class="error" style="color: red;"
												ng-show=" deathcaseform.age.$error.required"> Please
												Enter Sex. </small>
										</div>
									</div> -->

                                    </div>

                                    <div class="row">
                                        <label for="mobileno" class="col-xs-2 control-label"
                                            style="margin-top: 5px; max-width: 123px;">
                                            <span class="tooltipid tooltipstered" data-placement="right">Address:
                                            </span></label>

                                        <div class="form-group col-xs-2">
                                            <label for="state" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.11.
                                                    State<span style="color: red">*</span></span></label>
                                            <select
                                                class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
                                                id="state" ng-model="patient.state" style="pointer-events: none;"
                                                ng-options="s as s.statename for s in statelist | orderBy:'statename'"
                                                ng-change="getDistrict()" ng-required="true" name="state"
                                                ng-readonly="true" required="required" readonly="readOnly">
                                                <option value="" class="">-----Select-----</option>
                                                <option label="Andaman &amp; Nicobar Islands" value="object:59">Andaman
                                                    &amp; Nicobar Islands</option>
                                                <option label="Andhra Pradesh" value="object:60">Andhra
                                                    Pradesh</option>
                                                <option label="Arunachal Pradesh" value="object:61">
                                                    Arunachal Pradesh
                                                </option>
                                                <option label="Assam" value="object:62">Assam</option>
                                                <option label="Bihar" value="object:63">Bihar</option>
                                                <option label="Chandigarh" value="object:64">Chandigarh
                                                </option>
                                                <option label="Chhattisgarh" value="object:65">Chhattisgarh
                                                </option>
                                                <option label="Delhi" value="object:66">Delhi</option>
                                                <option label="Goa" value="object:67">Goa</option>
                                                <option label="Gujarat" value="object:68">Gujarat</option>
                                                <option label="Haryana" value="object:69">Haryana</option>
                                                <option label="Himachal Pradesh" value="object:70">Himachal
                                                    Pradesh</option>
                                                <option label="Jammu And Kashmir " value="object:71">Jammu
                                                    And Kashmir
                                                </option>
                                                <option label="Jharkhand" value="object:72">Jharkhand
                                                </option>
                                                <option label="Karnataka" value="object:58" selected="selected">
                                                    Karnataka
                                                </option>
                                                <option label="Kerala" value="object:73">Kerala</option>
                                                <option label="Ladakh" value="object:74">Ladakh</option>
                                                <option label="Lakshadweep" value="object:75">Lakshadweep
                                                </option>
                                                <option label="Madhya Pradesh" value="object:76">Madhya
                                                    Pradesh</option>
                                                <option label="Maharashtra" value="object:77">Maharashtra
                                                </option>
                                                <option label="Manipur" value="object:78">Manipur</option>
                                                <option label="Meghalaya" value="object:79">Meghalaya
                                                </option>
                                                <option label="Mizoram" value="object:80">Mizoram</option>
                                                <option label="Nagaland" value="object:81">Nagaland</option>
                                                <option label="Odisha" value="object:82">Odisha</option>
                                                <option label="Puducherry" value="object:83">Puducherry
                                                </option>
                                                <option label="Punjab" value="object:84">Punjab</option>
                                                <option label="Rajasthan" value="object:85">Rajasthan
                                                </option>
                                                <option label="Sikkim" value="object:86">Sikkim</option>
                                                <option label="Tamil Nadu" value="object:87">Tamil Nadu
                                                </option>
                                                <option label="Telangana" value="object:88">Telangana
                                                </option>
                                                <option label="The Dadra And Nagar Haveli And Daman And Diu"
                                                    value="object:89">The Dadra And Nagar Haveli And Daman
                                                    And Diu</option>
                                                <option label="Tripura" value="object:90">Tripura</option>
                                                <option label="Uttar Pradesh" value="object:91">Uttar
                                                    Pradesh</option>
                                                <option label="Uttarakhand" value="object:92">Uttarakhand
                                                </option>
                                                <option label="West Bengal" value="object:93">West Bengal
                                                </option>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show=" deathcaseform.state.$dirty &amp;&amp;  deathcaseform.state.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.state.$error.required">
                                                    Please Select State</small>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-2">
                                            <label for="district" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.12.
                                                    District<span style="color: red">*</span></span>
                                            </label> <select
                                                class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
                                                id="district" ng-model="patient.district" ng-readonly="true"
                                                style="pointer-events: none;"
                                                ng-options="d as d.districtname for d in districtlist | orderBy:'districtname'"
                                                ng-change="gettaluks()" ng-required="true" name="district"
                                                required="required" readonly="readOnly">
                                                <option value="" class="">-----Select-----</option>
                                                <option label="Bagalkot" value="object:112">Bagalkot
                                                </option>
                                                <option label="Ballari" value="object:113">Ballari</option>
                                                <option label="Belagavi" value="object:114">Belagavi
                                                </option>
                                                <option label="Bengaluru Rural" value="object:115">Bengaluru
                                                    Rural</option>
                                                <option label="Bengaluru Urban" value="object:116">Bengaluru
                                                    Urban</option>
                                                <option label="Bidar" value="object:117">Bidar</option>
                                                <option label="Chamarajanagar" value="object:118">
                                                    Chamarajanagar</option>
                                                <option label="Chikballapur" value="object:119">Chikballapur
                                                </option>
                                                <option label="Chikkamagaluru" value="object:120">
                                                    Chikkamagaluru</option>
                                                <option label="Chitradurga" value="object:121">Chitradurga
                                                </option>
                                                <option label="Dakshin Kannad" value="object:122">Dakshin
                                                    Kannad</option>
                                                <option label="Davangere" value="object:123">Davangere
                                                </option>
                                                <option label="Dharwad" value="object:124">Dharwad</option>
                                                <option label="Gadag" value="object:125">Gadag</option>
                                                <option label="Hassan" value="object:126">Hassan</option>
                                                <option label="Haveri" value="object:127">Haveri</option>
                                                <option label="Kalaburagi" value="object:128">Kalaburagi
                                                </option>
                                                <option label="Kodagu" value="object:129">Kodagu</option>
                                                <option label="Kolar" value="object:130">Kolar</option>
                                                <option label="Koppal" value="object:131">Koppal</option>
                                                <option label="Mandya" value="object:132">Mandya</option>
                                                <option label="Mysuru" value="object:133">Mysuru</option>
                                                <option label="Raichur" value="object:134">Raichur</option>
                                                <option label="Ramanagara" value="object:135">Ramanagara
                                                </option>
                                                <option label="Shivamogga" value="object:136">Shivamogga
                                                </option>
                                                <option label="Tumakuru" value="object:111" selected="selected">Tumakuru
                                                </option>
                                                <option label="Udupi" value="object:137">Udupi</option>
                                                <option label="Uttar Kannad" value="object:138">Uttar Kannad
                                                </option>
                                                <option label="Vijayapura" value="object:139">Vijayapura
                                                </option>
                                                <option label="Yadgir" value="object:140">Yadgir</option>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show=" deathcaseform.district.$dirty &amp;&amp;  deathcaseform.district.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show=" deathcaseform.district.$error.required">
                                                    Please Select District</small>
                                            </div>
                                        </div>

                                        <div class="form-group col-xs-2">
                                            <label for="subdistrict" class="labelchange" style="min-width: 107px">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.13. Sub
                                                    District<span style="color: red">*</span></span>
                                            </label><select
                                                class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required"
                                                id="subdistrict" ng-model="patient.taluk" ng-required="true"
                                                name="subdistrict" ng-change="getwards():getVillagebySubdistCode()"
                                                style="pointer-events: none;" ng-readonly="true"
                                                ng-options="t as (t.category1=='ULB'?'ULB-'+t.subdistrictname:t.subdistrictname) group by t.category1 for t in subdistrictlist"
                                                required="required" readonly="readOnly">
                                                <option value="" class="">-----Select-----</option>
                                                <optgroup label="Sub-Districts">
                                                    <option label="Chiknayakanhalli" value="object:142">
                                                        Chiknayakanhalli
                                                    </option>
                                                    <option label="Gubbi" value="object:143">Gubbi</option>
                                                    <option label="Koratagere" value="object:144">Koratagere
                                                    </option>
                                                    <option label="Kunigal" value="object:145">Kunigal
                                                    </option>
                                                    <option label="Madhugiri" value="object:146">Madhugiri
                                                    </option>
                                                    <option label="Pavagada" value="object:147">Pavagada
                                                    </option>
                                                    <option label="Sira" value="object:148">Sira</option>
                                                    <option label="Tiptur" value="object:149">Tiptur
                                                    </option>
                                                    <option label="Tumakuru" value="object:141" selected="selected">
                                                        Tumakuru
                                                    </option>
                                                    <option label="Turuvekere" value="object:150">Turuvekere
                                                    </option>
                                                </optgroup>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.subdistrict.$dirty &amp;&amp; deathcaseform.subdistrict.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.subdistrict.$error.required">
                                                    Please Select Sub-District</small>
                                            </div>
                                        </div>

                                        <!-- ng-change="patient.taluk.category=='U4'?getwards():getVillagebySubdistCode()" -->

                                        <!-- ng-show="patient.taluk.category=='S'   -->
                                        <div class="form-group col-xs-2"
                                            ng-show="facilityinfo.health_facility_urban_rural != 2">
                                            <label for="village" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.14.
                                                    Village<span style="color: red">*</span></span>
                                            </label> <select
                                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                id="village" ng-model="patient.village"
                                                ng-required="facilityinfo.health_facility_urban_rural != 2"
                                                name="village" ng-change="getLatLngByAddress(patient);"
                                                ng-options="v as v.villagename for v in villagelist  | orderBy:'villagename'"
                                                required="required">
                                                <option value="" class="" selected="selected">
                                                    -----Select-----</option>
                                                <option label="Acharapalya" value="object:151">Acharapalya
                                                </option>
                                                <option label="Adlapura" value="object:152">Adlapura
                                                </option>
                                                <option label="ANTHARASANAHALLI" value="object:153">
                                                    ANTHARASANAHALLI
                                                </option>
                                                <option label="ARALIHALLI" value="object:154">ARALIHALLI
                                                </option>
                                                <option label="B G Palya" value="object:155">B G Palya
                                                </option>
                                                <option label="Hebbur" value="object:156">Hebbur</option>
                                                <option label="Heggere" value="object:157">Heggere</option>
                                                <option label="Hirehalli" value="object:158">Hirehalli
                                                </option>
                                                <option label="Kenchenahalli" value="object:159">
                                                    Kenchenahalli</option>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.village.$dirty &amp;&amp; deathcaseform.village.$invalid">
                                                <small class="error" style="color: red;"
                                                    ng-show="deathcaseform.village.$error.required">
                                                    Please Select Village</small>
                                            </div>
                                        </div>


                                        <!-- ng-options="v as v.wardname for v in wardSubcenterList  | orderBy:'wardname' -->

                                        <div class="form-group col-xs-2 ng-hide"
                                            ng-show="facilityinfo.health_facility_urban_rural === 2">
                                            <label>Ward<span style="color: red">*</span></label> <select id="wardlistid"
                                                name="wardlistid" ng-options="m as m.wardname for m in wardlist"
                                                ng-model="patient.ward" ng-change="getulbareas()"
                                                ng-required="facilityinfo.health_facility_urban_rural === 2"
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                                                <option value="" class="" selected="selected">--Select--
                                                </option>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.wardlistid.$dirty &amp;&amp; deathcaseform.wardlistid.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.wardlistid.$error.required">
                                                    Ward is required.</small>
                                            </div>

                                            <!-- <div ng-show="wardreq">
												<small style="color: red;"> Please select ward. </small>
											</div> -->

                                        </div>


                                        <div class="form-group col-xs-2 ng-hide" ng-show="hasRole('HFUSCUSER')">
                                            <label>Area<span style="color: red">*</span></label> <select id="areaid"
                                                name="areaname" ng-options="m as m.areaname for m in areaList"
                                                ng-model="patient.area" ng-required="hasRole('HFUSCUSER')"
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-required">
                                                <option value="" class="" selected="selected">--Select--
                                                </option>
                                            </select>
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.areaname.$dirty &amp;&amp; deathcaseform.areaname.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.areaname.$error.required">
                                                    Ward is required.</small>
                                            </div>
                                            <!-- <div ng-show="wardreq">
												<small style="color: red;"> Please select ward. </small>
											</div> -->

                                        </div>




                                        <!-- 	<div class="form-group col-xs-2">
											<label for="subdistrict" class="labelchange"
												style="min-width: 107px">2.13. Sub District<span
												style="color: red">*</span>
											</label><select class="form-control" id="subdistrict"
												ng-model="patient.taluk" ng-required="true" name=""
												ng-change="getVillagebySubdistCode()"
												style="pointer-events: none;" ng-readonly="true"
												ng-options="t as t.subdistrictname for t in subdistrictlist  | orderBy:'subdistrictname'">
												<option value="">-----Select-----</option>
											</select>
											<div class="error"
												ng-show="deathcaseform.subdistrict.$dirty &amp;&amp; deathcaseform.subdistrict.$invalid">
												<small class="error" style="color: red;"
													ng-show="deathcaseform.subdistrict.$error.required">
													Please Select Sub-District</small>
											</div>
										</div>


										<div class="form-group col-xs-2">
											<label for="village" class="labelchange">2.14.
												Village<span style="color: red">*</span>
											</label> <select class="form-control" id="village"
												ng-model="patient.village" ng-required="true" name="village"
												ng-change="getLatLngByAddress(patient);"
												ng-options="v as v.villagename for v in villagelist  | orderBy:'villagename'">
												<option value="">-----Select-----</option>
											</select>
											<div class="error"
												ng-show="deathcaseform.village.$dirty &amp;&amp; deathcaseform.village.$invalid">
												<small class="error" style="color: red;"
													ng-show="deathcaseform.village.$error.required">
													Please Select Village</small>
											</div>
										</div> -->
                                    </div>
                                    <div class="row">
                                        <label class="col-xs-2 control-label" style="max-width: 123px;"></label>

                                        <div class="form-group col-xs-2">
                                            <label for="houseno" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.15. House
                                                    No</span></label> <input
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty"
                                                id="houseno" type="text" ng-model="patient.patient_house_number">
                                        </div>


                                        <div class="form-group col-xs-3">
                                            <label for="streetname" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.16.
                                                    Street Name</span></label> <input
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                id="streetname" type="text" name="streetname"
                                                ng-model="patient.patient_home_street_address_line1" ng-maxlength="100">
                                            <div class="error ng-hide"
                                                ng-show=" deathcaseform.streetname.$dirty &amp;&amp; deathcaseform.streetname.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show=" deathcaseform.streetname.$error.maxlength">
                                                    Please Enter maximum 100 letters. </small>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-3">
                                            <label for="landmark" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">2.17.
                                                    Landmark</span></label> <input
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                id="streetname" type="text" ng-model="patient.patient_home_landmark"
                                                name="landmark" ng-maxlength="100">
                                            <div class="error ng-hide"
                                                ng-show=" deathcaseform.landmark.$dirty &amp;&amp; deathcaseform.landmark.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show=" deathcaseform.landmark.$error.maxlength">
                                                    Please Enter maximum 100 letters. </small>
                                            </div>
                                        </div>
                                    </div>
                                    </fieldset>
                                    <fieldset style="background-color: cornsilk;">
                                        <legend align="left"
                                            style="border-bottom: none; margin-bottom: 0px; width: auto;">
                                            <b style="font-size: 14px;">
                                                <span class="tooltipid tooltipstered" data-placement="right">3.
                                                    Death Case
                                                    Details:</span></b>
                                        </legend>

                                        <div class="form-group col-xs-4">
                                            <label for="deathcause" class="labelchange">
                                                <span class="tooltipid tooltipstered" data-placement="right">3.1.
                                                    Probable Cause Of Death <span style="color: red">*</span></span>
                                            </label> <select id="deathcause" ng-model="patient.deatcause"
                                                name="deathcause" ng-required="true"
                                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required"
                                                ng-options="d as d.health_condition_name for d in deathCauseList  | orderBy:'displayorder'"
                                                required="required">
                                                <option value="" class="" selected="selected">----Select----
                                                </option>
                                            </select>

                                        </div>
                                        <div class="form-group col-xs-2 ng-hide"
                                            ng-show="patient.deatcause.health_condition_name == 'Others'">
                                            <label for="otherdc" class="labelchange" style="min-width: 140px">3.2. Other
                                                Death
                                                Cause<span style="color: red">*</span></label> <input
                                                class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                style="min-width: 140px" id="otherdc" type="text" max="128"
                                                ng-model="patient.otherDeathCause" ng-maxlength="128" name="otherdc">
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.otherdc.$dirty &amp;&amp; deathcaseform.otherdc.$invalid">
                                                <small class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.otherdc.$error.required">
                                                    Please Enter Other Death Cause. </small> <small
                                                    class="error ng-hide" style="color: red;"
                                                    ng-show="deathcaseform.otherdc.$error.maxlength">
                                                    Please Enter maximum 128 letters. </small>
                                            </div>
                                        </div>

                                        <div class="form-group col-xs-2">
                                            <label for="dateofdeath" class="labelchange" style="min-width: 113px"><span
                                                    class="tooltipid tooltipstered" data-placement="right">3.3. Date Of
                                                    Death<span style="color: red">*</span></span>
                                            </label>
                                            <div class="input-group input-append date dateclass"
                                                data-provide="datepicker">
                                                <input type="text"
                                                    class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required ng-valid-pattern"
                                                    id="dateofdeath" name="dateofdeath" ng-model="patient.dateofdeath"
                                                    ng-required="true" placeholder="dd/mm/yyyy" style="min-width: 80px;"
                                                    ng-change="checkDateValidation(patient.dateofdeath,patient.dateofbirth,'insert'); validate_DOB_DOD(patient.dateofdeath,'dodmain');ValidationageDOD('insert');"
                                                    ng-pattern="/^(31[ \/ ](0[13578]|1[02])[ \/ ](18|19|20)[0-9]{2})|((29|30)[\/](01|0[3-9]|1[0-2])[\/](18|19|20)[0-9]{2})|((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[0-2])[\/](18|19|20)[0-9]{2})|(29[\/](02)[\/](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000))$/"
                                                    required="required">
                                                <span class="input-group-addon datepicker" style="padding: 2px 12px;">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            <div class="error ng-hide"
                                                ng-show="deathcaseform.dateofdeath.$dirty &amp;&amp; deathcaseform.dateofdeath.$invalid">
                                                <small class="error" style="color: red;"
                                                    ng-show="deathcaseform.dateofdeath.$error.required">
                                                    Please Select Date of Death.</small> <small class="error ng-hide"
                                                    style="color: red;"
                                                    ng-show="deathcaseform.dateofdeath.$error.pattern">
                                                    Please Enter valid date in dd/mm/yyyy format.</small>
                                            </div>
                                            <small class="error ng-hide" style="color: red;" ng-show="showDateError">
                                                Date
                                                Of
                                                Birth should be
                                                smaller than Date Of death.</small>
                                            <div ng-show="showdoderror" class="ng-hide">
                                                <small class="error"> Date of death can not be
                                                    earlier than 01/01/1900 and can not beyond todays date.
                                                </small>
                                            </div>
                                            <div ng-show="showDobAgeError" class="ng-hide">
                                                <small class="error"> Date of Death can not be
                                                    earlier than Date of Birth. </small>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- <div class="form-group col-xs-2">
						<label for="wardno" class="labelchange">Ward Number</label> <input
							class="form-control" id="wardno" type="text"
							ng-model="patient.patient_wardno" name="wardno">

					</div> -->


                                            <div class="form-group col-xs-4">
                                                <label for="remarks" class="labelchange">
                                                    <span class="tooltipid tooltipstered" data-placement="right">3.4.
                                                        Remarks</span></label>
                                                <input
                                                    class="form-control ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength"
                                                    id="remarks" type="text" name="remarks" ng-model="patient.remarks"
                                                    ng-maxlength="500">
                                                <div class="error ng-hide"
                                                    ng-show=" deathcaseform.remarks.$dirty &amp;&amp; deathcaseform.remarks.$invalid">
                                                    <small class="error ng-hide" style="color: red;"
                                                        ng-show=" deathcaseform.remarks.$error.maxlength">
                                                        Please Enter maximum 500 letters. </small>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="alert alert-success ng-hide" ng-show="deathcasedetailsSaved"
                                        role="alert">
                                        Data
                                        Saved Successfully</div>
                                    <div class="row ng-hide" ng-show="healthidnotpresent">
                                        <div class="col-xs-12">
                                            <div class="alert alert-danger" role="alert">There seems
                                                to be some server issue. Please login again or contact
                                                helpdesk.</div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="form-group col-xs-3">
									<p style="padding-left: 3px">
										<span style="color: red">*</span> = Mandatory Values
									</p>
								</div> -->
                                        <div class="form-group col-xs-6" style="padding-left: 6px;">
                                            <button class="btn btn-primary"
                                                ng-click="save_Patient_Details_of_deathCases()"
                                                ng-disabled="deathcaseform.$invalid || showDateError || showdoberror || showdoberror ||showDobAgeError || iderror"
                                                disabled="disabled">
                                                <span class="tooltipid tooltipstered"
                                                    data-placement="right">Save</span></button>
                                            <button class="btn btn-primary" ng-click="restReportingForm()">
                                                <span class="tooltipid tooltipstered"
                                                    data-placement="right">Reset</span></button>
                                        </div>
                                    </div>



                                    </form>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="row">
                                <div class="col-xs-12" style="padding-left: 0px">
                                    <b style="font-size: 15px; font-weight: bold;" class="tooltipid tooltipstered"
                                        data-placement="right">4.
                                        List of
                                        Reported Deaths</b>
                                </div>
                            </div>
                            <table class="table table-sm table-bordered" id="tableId">
                                <thead>
                                    <tr style="background: #D3D3D3">
                                        <th>Sl#</th>
                                        <th class="printhide">Action</th>
                                        <th>2.2. Person Name<span><a ng-click="showCols = !showCols"
                                                    style="cursor: pointer"> <span
                                                        class="glyphicon glyphicon-arrow-right printhide"
                                                        ng-show="!showCols"></span>
                                                    <span class="glyphicon glyphicon-arrow-left printhide ng-hide"
                                                        ng-show="showCols"></span>
                                                </a></span></th>
                                        <th ng-show="showCols" class="ng-hide">2.5. Age</th>
                                        <th ng-show="showCols" class="ng-hide">2.7. Gender</th>
                                        <th ng-show="showCols" class="ng-hide">2.8. ID Type/Id No</th>
                                        <!-- <th ng-show="showCols">Phone No</th> -->
                                        <th ng-show="showCols" class="ng-hide">2.11. State</th>
                                        <th ng-show="showCols" class="ng-hide">2.12. District</th>
                                        <th ng-show="showCols" class="ng-hide">2.13. Sub District</th>
                                        <th ng-show="showCols" class="ng-hide">2.14. Village</th>
                                        <th ng-show="showCols" class="ng-hide">2.15. Address</th>
                                        <th>3.1. Probable Cause Of Death</th>
                                        <th>3.3. Date of Death</th>
                                        <th>3.4. Remarks</th>



                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- ngRepeat: p in patientList -->
                                </tbody>
                            </table>

                            <div class="alert alert-success ng-binding ng-hide" ng-show="finalsubmitsaved" role="alert">
                                Data
                                Successfully
                                submitted on 2023-10-03 14:27:22</div>
                            <button class="btn btn-primary printhide" ng-click="openSubmissionAlertModal()"
                                style="margin: 5px;"><span class="tooltipid tooltipstered"
                                    data-placement="right">Submit</span></button>

                        </div>


                    </div>
                </div>

            </section>



        </div>



        <!-- Line Listing table  -->






        <!-- /.content-wrapper -->


        <script>
        $(document).ready(function() {
            // $("#first-name-error").text("New word");
            // console.log(fname);
            //Detect that a user has started entering their name itno the name input
            // Name can't be blank
            $('#first-name').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
                var name = regex.test(is_name);
                if (name) {
                    $("#first-name-error").text("");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#first-name-error").text("Please enter valid name");
                }
            });

            $('#last-name').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                var regex = /^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$/;
                var name = regex.test(is_name);
                if (name) {
                    $("#last-name-error").text("");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#last-name-error").text("Please enter valid last name");
                }
            });



            $('#dob').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "") {
                    $("#dob-error").text("Dob is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#dob-error").text("");
                }
            });


            $('#gander').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your Gender") {
                    $("#gander-error").text("Gander  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#id-type').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your id-type") {
                    $("#id-type-error").text("Id Type  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#identification').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                var regex = /^[0-9]+$/;
                var name = regex.test(is_name);


                if (name) {
                    $("#identification-error").text("");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#identification-error").text("Please enter valid identity no");
                }
            });


            $('#citizenship').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your Citizenship") {
                    $("#citizenship-error").text("citizenship   is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#citizenship-error").text("");
                }
            });


            $('#house-no').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "") {
                    $("#house-no-error").text("House no is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#house-no-error").text("");
                }
            });

            $('#state').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your state") {
                    $("#state-error").text("state number  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#district').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your district") {
                    $("#district-error").text("district number  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#taluka').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your taluka") {
                    $("#taluka-error").text("taluka number  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#village').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your village") {
                    $("#village-error").text("Village number  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#street-name').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "") {
                    $("#street-name-error").text("Street-name  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#street-name-error").text("");
                }
            });

            $('#landmark').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "") {
                    $("#landmark-error").text("Landmark  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#landmark-error").text("");
                }
            });

            $('#pin-code').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                var regex = /^[0-9]+$/;
                var name = regex.test(is_name);

                if (name) {
                    $("#pin-code-error").text("");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#pin-code-error").text("Please enter valid pin code");
                }
            });

            $('#provisinal-diagnosis').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your Diagnosis") {
                    $("#provisinal-diagnosis-error").text("Diagnosis number  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#gander-error").text("");
                }
            });

            $('#date-of-onset').on('input', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "") {
                    $("#date-of-onset-error").text("date-of-onset  is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#pin-code-error").text("");
                }
            });


            $('#OPD-IPD').on('click', function() {
                var input = $(this);

                var is_name = input.val();
                if (is_name == "Select Your OPD-IPD") {
                    $("#opd-ipd-error").text("OPD/IPD is required");
                    // input.removeClass("invalid").addClass("valid");
                } else {
                    $("#opd-ipd-error").text("");
                }
            });

            // Email must be an email
            $('#contact_email').on('input', function() {
                var input = $(this);
                var re = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                var is_email = re.test(input.val());
                if (is_email) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            // Website must be a website
            $('#contact_website').on('input', function() {
                var input = $(this);
                if (input.val().substring(0, 4) == 'www.') {
                    input.val('http://www.' + input.val().substring(4));
                }
                var re =
                /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&:\/~+#-]*[\w@?^=%&\/~+#-])?/;
                var is_url = re.test(input.val());
                if (is_url) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            // Message can't be blank
            $('#contact_message').keyup(function(event) {
                var input = $(this);
                var message = $(this).val();
                console.log(message);
                if (message) {
                    input.removeClass("invalid").addClass("valid");
                } else {
                    input.removeClass("valid").addClass("invalid");
                }
            });
            // After Form Submitted Validation

        });
        </script>


        <!-- Main Footer -->
        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
