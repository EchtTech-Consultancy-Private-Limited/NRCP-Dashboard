<!-- <link rel="stylesheet" src="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"> -->

<!-- <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"  role="menu" data-accordion="false">

        <li class="nav-item ">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
            </a>

        </li>

        <li class="nav-item">

        </li>

        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ Request::routeIs('sform') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>lform</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('sform') }}" class="nav-link {{ Request::routeIs('sform') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>sform</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('Human-rabies-map') }}" class="nav-link {{ Request::routeIs('pform2') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>pform map</p>
            </a>
        </li>
    </ul>
</nav> -->

<ul class="accordion side-link laboratory-sidebar">
    <li>
        @if (Auth::user()->user_type == 2)
        <div
            class="arrow arrow-right link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'lab-dashboard')?'active':'' }}">
            <i class="fa fa-list iconmargin-set" aria-hidden="true"></i>  <a href="{{ url('/lab-dashboard') }}">
                Dashboard</a>
        </div>
        <div
            class="arrow arrow-right link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'general-laboratory')?'active':'' }}">
            <i class="fa fa-list iconmargin-set" aria-hidden="true"></i>  <a href="{{ url('/general-laboratory') }}">
                General</a>
        </div>
        <div
            class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'quality-assurance')?'active':'' }}">
            <i class="fa fa-check iconmargin-set" aria-hidden="true"></i> <a href="{{ url('/quality-assurance') }}">
                Quality</a>
        </div>
        <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'equipment')?'active':'' }}">
        <i class="fa fa-cogs iconmargin-set" aria-hidden="true"></i>  <a href="{{ url('/equipment') }}">Equipment</a>
        </div>
        <div
            class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'rabies-test')?'active':'' }}">
            <i class="fa fa-registered iconmargin-set" aria-hidden="true"></i><a href="{{ url('/rabies-test') }}">
                Rabies</a>
        </div>
        <div
            class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'expenditure')?'active':'' }}">
            <i class="fa fa-expand iconmargin-set" aria-hidden="true"></i> <a href="{{ url('/expenditure') }}">
                Expenditure</a> </i>
        </div>
        <div
            class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'report-list')?'active':'' }}">
            <i class="fa fa-file iconmargin-set" aria-hidden="true"></i>   <a href="{{ url('/report-list') }}">Reports</a>
            </i>
        </div>
        @endif
        @if (Auth::user()->user_type == 1)
        <!-- ************** -->
        <div class="sidebarAccordion">

            <div
                class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'dashboard')?'active':'' }}">
                <a class="accordion-heading" data-toggle="collapse" href="#multiCollapseExample1" role="button"
                    aria-expanded="false" aria-controls="multiCollapseExample1">Rabies Dashboard </a>



            </div>

            <div class="row">
                <div class="col">                    
                    <div class="collapse multi-collapse {{ (in_array(Request::segment(1), ['dashboard','pform','sform','lform'])) ? 'show':'' }}" id="multiCollapseExample1">
                        <div class="card card-body">
                            <div
                                class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'dashboard')?'active':'' }}">
                                <a href="{{ url('/dashboard') }}">Dashboard</a> </i>
                            </div>
                            <div
                                class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'pform')?'active':'' }}">
                                <a href="{{ url('/pform') }}">P Form</a> </i>
                            </div>
                            <div
                                class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'sform')?'active':'' }}">
                                <a href="{{ url('/sform') }}">S Form</a> </i>
                            </div>
                            <div
                                class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'lform')?'active':'' }}">
                                <a href="{{ url('/lform') }}">L Form</a> </i>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div
            class="link bg-primary text-white dashboard-title {{ (Request::routeIs('laboratory-dashboard') == 'laboratory-dashboard')?'active':'' }}">
            <a href="{{ url('/laboratory-dashboard') }}">Laboratory Dashboard</a> </i>
        </div>
        <div
            class="link bg-primary text-white dashboard-title {{ (Request::routeIs('nhm.index') == 'nhm.index')?'active':'' }}">
            <a href="{{ route('nhm.index') }}">NHM Dashboard</a> </i>
        </div>
        <!-- ********************* -->

        @endif
        <!-- <div class="link bg-primary text-white dashboard-title">
            <a href="{{ url('/dashboard') }}">Dashboard</a> </i>
        </div> -->
    </li>
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




</ul>


<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->

<script>
// $(function() {
//     var Accordion = function(el, multiple) {
//         this.el = el || {};
//         this.multiple = multiple || false;

//         // Variables privadas
//         var links = this.el.find('.link');
//         // Evento
//         links.on('click', {
//             el: this.el,
//             multiple: this.multiple
//         }, this.dropdown)
//     }

//     Accordion.prototype.dropdown = function(e) {
//         var $el = e.data.el;
//         $this = $(this),
//             $next = $this.next();

//         $next.slideToggle();
//         $this.parent().toggleClass('open');

//         if (!e.data.multiple) {
//             $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
//         };
//     }

//     var accordion = new Accordion($('#accordion'), false);
// });
</script>