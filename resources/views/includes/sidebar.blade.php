<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column"  role="menu" data-accordion="false">

        <li class="nav-item ">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <!-- <i class="right fas fa-angle-"></i> -->
                </p>
            </a>

        </li>

        <li class="nav-item">
            <a href="{{ url('pform') }}" class="nav-link {{ Request::routeIs('pform') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>pform</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link {{ Request::routeIs('sform') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>lform</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('sform') }}" class="nav-link {{ Request::routeIs('sform') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>sform</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('Human-rabies-map') }}" class="nav-link {{ Request::routeIs('pform2') ? 'active':'' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>pform map</p>
            </a>
        </li>
    </ul>
</nav>




<!--
<script>
$(".nav-sidebar .nav-item .nav-link").click(() => {
    $(".nav-sidebar .nav-item").addClass("active");
    // alert("hellow world")

})
console.log("hellow world")
</script> -->
