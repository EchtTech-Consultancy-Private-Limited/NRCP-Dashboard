<ul class="accordion side-link laboratory-sidebar">
    <li>
        @if (Auth::user()->user_type == 2)
            <div
                class="arrow arrow-right link bg-primary text-white dashboard-title {{ Request::segment(1) == 'lab-dashboard' ? 'active' : '' }}">
                <a href="{{ url('/lab-dashboard') }}"> <i class="fa fa-dashboard iconmargin-set" aria-hidden="true"></i>
                    Dashboard</a>
            </div>
            <div
                class="arrow arrow-right link bg-primary text-white dashboard-title {{ Request::segment(1) == 'general-laboratory' ? 'active' : '' }}">
                <a href="{{ url('/general-laboratory') }}"> <i class="fa fa-list iconmargin-set" aria-hidden="true"></i>
                    General</a>
            </div>
            <div class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'quality' ? 'active' : '' }}">
                <a href="{{ url('/quality') }}"> <i class="fa fa-check iconmargin-set" aria-hidden="true"></i>
                    Quality</a>
            </div>
            <div
                class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'equipments' ? 'active' : '' }}">
                <a href="{{ url('/equipments') }}"><i class="fa fa-cogs iconmargin-set" aria-hidden="true"></i>
                    Equipments</a>
            </div>
            <div
                class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'rabies-test' ? 'active' : '' }}">
                <a href="{{ url('/rabies-test') }}"> <i class="fa fa-registered iconmargin-set" aria-hidden="true"></i>
                    Rabies Test</a>
            </div>
            <div
                class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'expenditure' ? 'active' : '' }}">
                <a href="{{ url('/expenditure') }}"> <i class="fa fa-expand iconmargin-set" aria-hidden="true"></i>
                    Finance</a> </i>
            </div>
            <div
                class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'report-list' ? 'active' : '' }}">
                <a href="{{ url('/report-list') }}"> <i class="fa fa-file iconmargin-set" aria-hidden="true"></i>
                    Report</a>
                </i>
            </div>
        @endif
        @if (Auth::user()->user_type == 1)
            <!-- ************** -->
            <div class="sidebarAccordion">

                <div class="link bg-primary text-white dashboard-title">
                    <a class="accordion-heading" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                        aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fa fa-home"
                            aria-hidden="true"></i> Rabies Dashboard </a>



                </div>

                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse {{ in_array(Request::segment(1), ['dashboard', 'pform', 'sform', 'lform']) ? 'show' : '' }}"
                            id="multiCollapseExample1">
                            <div class="card card-body">
                                <div
                                    class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'dashboard' ? 'active' : '' }}">
                                    <a href="{{ url('/dashboard') }}">Dashboard</a> </i>
                                </div>
                                <div
                                    class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'pform' ? 'active' : '' }}">
                                    <a href="{{ url('/pform') }}">P Form</a> </i>
                                </div>
                                {{-- <div
                                class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'sform')?'active':'' }}">
                                <a href="{{ url('/sform') }}">S Form</a> </i>
                            </div> --}}
                                <div
                                    class="link bg-primary text-white dashboard-title {{ Request::segment(1) == 'lform' ? 'active' : '' }}">
                                    <a href="{{ url('/lform') }}">L Form</a> </i>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div
                class="link bg-primary text-white dashboard-title {{ Request::routeIs('laboratory-dashboard') == 'laboratory-dashboard' ? 'active' : '' }}">
                <a href="{{ url('/laboratory-dashboard') }}"><i class="fa fa-flask" aria-hidden="true"></i> Laboratory
                    Dashboard</a> </i>
            </div>
            <div
                class="link bg-primary text-white dashboard-title {{ Request::routeIs('nhm.index') == 'nhm.index' ? 'active' : '' }}">
                <a href="{{ route('nhm.index') }}"><i class="fa fa-hospital-o" aria-hidden="true"></i> NHM
                    Dashboard</a> </i>
            </div>
            <!-- ********************* -->
        @endif
        <!-- <div class="link bg-primary text-white dashboard-title">
            <a href="{{ url('/dashboard') }}">Dashboard</a> </i>
        </div> -->

        @if (env('SIDE_BAR_SHOW') != '0')
            <!-- <li>
            <div class="link"> <i class="far fa-circle nav-icon"></i>pForm<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="{{ url('pformDashboard') }}" class="{{ Request::routeIs('pform2') ? 'active' : '' }}">Dashboard</a></li>
                <li><a href="{{ url('pform') }}" class=" {{ Request::routeIs('pform') ? 'active' : '' }}">pForm</a>
                </li>


            </ul>
        </li>
        <li>
            <div class="link"> <i class="far fa-circle nav-icon"></i>sform<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="#">Dashboard</a></li>
                <li><a href="{{ url('sform') }}" class="{{ Request::routeIs('sform') ? 'active' : '' }}">sform</a>
                </li>

            </ul>
        </li> -->
        @endif

        @if (Auth::user()->user_type == 3)
            <div
                class="arrow arrow-right link bg-primary text-white dashboard-title {{ request()->routeIs('state.dashboard') ? 'active' : '' }}">
                <a href="{{ route('state.dashboard') }}"> <i class="fa fa-dashboard iconmargin-set"
                        aria-hidden="true"></i>
                    Dashboard</a>
            </div>

            <div class="sidebarAccordion">
                <div class="link bg-primary text-white dashboard-title">
                    <a class="accordion-heading" data-toggle="collapse" href="#multiCollapseExample3" role="button"  aria-expanded="false" aria-controls="multiCollapseExample3"><i class="fa fa-file-text-o" aria-hidden="true"></i>Investigate Report</a>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse {{ in_array(request()->route()->getName(), ['state.investigate-create', 'state.investigate-report-list']) ? 'show' : '' }}"
                            id="multiCollapseExample3">
                        
                            <div class="card card-body">
                                <div
                                    class="link bg-primary text-white dashboard-title {{ request()->routeIs('state.investigate-create') ? 'active' : '' }}">
                                    <a href="{{ route('state.investigate-create') }}"> Create</a>
                                </div>
                                <div
                                    class="link bg-primary text-white dashboard-title {{ request()->routeIs('state.investigate-report-list') ? 'active' : '' }}">
                                    <a href="{{ route('state.investigate-report-list') }}"> List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="sidebarAccordion">

                <div class="link bg-primary text-white dashboard-title">
                    <a class="accordion-heading" data-toggle="collapse" href="#multiCollapseExample1" role="button"  aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fa fa-file-text-o" aria-hidden="true"></i>State Monthly Report </a>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse {{ in_array(request()->route()->getName(), ['state.monthly-report', 'state.monthly-report-list']) ? 'show' : '' }}"
                            id="multiCollapseExample1">
                        
                            <div class="card card-body">
                                <div
                                    class="link bg-primary text-white dashboard-title {{ request()->routeIs('state.monthly-report') ? 'active' : '' }}">
                                    <a href="{{ route('state.monthly-report') }}"> Create</a>
                                </div>
                                <div
                                    class="link bg-primary text-white dashboard-title {{ request()->routeIs('state.monthly-report-list') ? 'active' : '' }}">
                                    <a href="{{ route('state.monthly-report-list') }}"> List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="sidebarAccordion">

                <div class="link bg-primary text-white dashboard-title">
                    <a class="accordion-heading" data-toggle="collapse" href="#multiCollapseExample2" role="button"  aria-expanded="false" aria-controls="multiCollapseExample2"><i class="fa fa-list" aria-hidden="true"></i>Line List of Suspected</a>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse {{ in_array(request()->route()->getName(), ['state.line-suspected-list', 'state.line-suspected-create']) ? 'show' : '' }}"
                            id="multiCollapseExample2">
                        
                            <div class="card card-body">
                                <div
                                    class="link bg-primary text-white dashboard-title {{ request()->routeIs('state.line-suspected-create') ? 'active' : '' }}">
                                    <a href="{{ route('state.line-suspected-create') }}"> Create</a>
                                </div>
                                <div
                                    class="link bg-primary text-white dashboard-title {{ request()->routeIs('state.line-suspected-list') ? 'active' : '' }}">
                                    <a href="{{ route('state.line-suspected-list') }}">List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="arrow arrow-right link bg-primary text-white dashboard-title {{ request()->routeIs('state.excel-report') ? 'active' : '' }}">
                <a href="{{ route('state.excel-report') }}"> <i class="fa fa-file-text-o" aria-hidden="true"></i>  Report</a>
            </div>
        @endif

    </li>
</ul>
