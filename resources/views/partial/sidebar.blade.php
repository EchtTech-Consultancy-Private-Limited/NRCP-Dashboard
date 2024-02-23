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

<ul class="accordion side-link">
    <li>
        @if (Auth::user()->user_type == 2)
            <div class="arrow arrow-right link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'general-laboratory')?'active':'' }}">
                <a href="{{ url('/general-laboratory') }}"><i class="fa fa-list iconmargin-set" aria-hidden="true"></i>  General</a>
            </div>
            <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'quality-assurance')?'active':'' }}">
                <a href="{{ url('/quality-assurance') }}"><i class="fa fa-check iconmargin-set" aria-hidden="true"></i> Quality</a> 
            </div>
            <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'equipment')?'active':'' }}">
                <a href="{{ url('/equipment') }}"><i class="fa fa-cogs iconmargin-set" aria-hidden="true"></i> Equipment</a>
            </div>
            <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'rabies-test')?'active':'' }}">
                <a href="{{ url('/rabies-test') }}"><i class="fa fa-registered iconmargin-set" aria-hidden="true"></i> Rabies</a> 
            </div>
            <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'expenditure')?'active':'' }}">
                <a href="{{ url('/expenditure') }}"><i class="fa fa-expand iconmargin-set" aria-hidden="true"></i> Expenditure</a> </i>
            </div>
            <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'report-list')?'active':'' }}">
                <a href="{{ url('/report-list') }}"><i class="fa fa-file iconmargin-set" aria-hidden="true"></i> Reports</a> </i>
            </div>
        @endif
        @if (Auth::user()->user_type == 1)
            <div class="link bg-primary text-white dashboard-title {{ (Request::segment(1) == 'dashboard')?'active':'' }}">
                <a href="{{ url('/dashboard') }}">Dashboard</a> </i>
            </div>
        @endif
        <!-- <div class="link bg-primary text-white dashboard-title">
            <a href="{{ url('/dashboard') }}">Dashboard</a> </i>
        </div> -->
    </li>
    @if (env('SIDE_BAR_SHOW') != '0')
        <!-- <li>
            <div class="link"> <i class="far fa-circle nav-icon"></i>pForm<i class="fa fa-chevron-down"></i></div>
            <ul class="submenu">
                <li><a href="{{ url('pformDashboard') }}"
                        class="{{ Request::routeIs('pform2') ? 'active' : '' }}">Dashboard</a></li>
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
