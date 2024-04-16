<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>NRCP | @section('title'){{ config('app.name') }}@show</title>
<script src="{{ asset('jquery.js') }}"></script>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/css/print.css') }}"  media="print">   -->
<link href="{{asset('assets/css/select2.min.css')}}" rel="stylesheet" />
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('AdminLTELogo.png') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<!-- <link rel="stylesheet" href="{{ asset('assets/login/plugins/fontawesome-free/css/all.min.css') }}"> -->
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('assets/login/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('assets/login/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/login/dist/css/tempusdominus-bootstrap-4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/login/dist/css/tempusdominus-bootstrap-4.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/pform_css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/filter_multi_select.css') }}">


<!-- <link rel="stylesheet" href="{{ asset('assets/css/dataTables.dataTables.css') }}"> -->

{{-- highchart --}}
<script src="{{ asset('assets/js/highcharts/highmaps.js') }}"></script>
<script src="{{ asset('assets/js/highcharts/highcharts.js') }}"></script>
<script src="{{ asset('assets/js/highcharts/exporting.js') }}"></script>
<script src="{{ asset('assets/js/highcharts/export-data.js') }}"></script>
<script src="{{ asset('assets/js/highcharts/highcharts-more.js') }}"></script>
<script src="{{ asset('assets/js/highcharts/solid-gauge.js') }}"></script>
<script src="{{ asset('assets/js/highcharts/accessibility.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.js') }}"></script>
{{-- end highchart --}}
<!-- <link rel="stylesheet" href="{{ asset('assets/css/datatablemin.css') }}"> -->
<link rel="stylesheet" href="{{ asset('assets/css/datatable.min.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/css/datatablebuttonmin.css') }}"> -->
<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
