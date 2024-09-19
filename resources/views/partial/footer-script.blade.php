<footer class="main-footer text-center">
    <strong>Copyright &copy; {{date('Y')}} <a href="#"></a>NRCP. </strong> All rights reserved.
   
  </footer>
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('assets/js/filter-multi-select-bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('assets/login/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/custom_js/rabies_dropdown.js') }}"></script>
<script src="{{ asset('assets/js/pform.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/sform.js') }}"></script>
<script src="{{ asset('assets/js/general_profile.js') }}"></script>
<script src="{{ asset('assets/js/quality_assurance.js') }}"></script>
<!-- <script src="{{ asset('jquery.min.js') }}"></script> -->
<!-- Bootstrap -->
<script src="{{ asset('assets/login/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/login/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/login/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<script src="{{ asset('assets/js/select2.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="{{ asset('assets/dashboard_highchart.js') }}"></script>

<!-- jQuery Mapael -->
<script src="{{ asset('assets/login/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('assets/login/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('assets/login/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/login/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script type="text/javascript" src="{{ asset('jsdelivr.net_npm_apexcharts.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/login/dist/js/demo.js') }}"></script>

<!-- <script src="{{ asset('assets/js/datatable.js') }}"></script>
<script src="{{ asset('assets/js/datatable.js') }}"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/login/dist/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('assets/district_map.js') }}"></script>
<script src="{{ asset('assets/indiaMap.js') }}"></script>
<script src="{{ asset('assets/js/deletejsfile.js') }}"></script>
<script src="{{ asset('assets/statedashboard.js') }}"></script>

<!-- datatable js -->

<script src="{{ asset('assets/js/datatablemin.js') }}"></script>
<script src="{{ asset('assets/js/datatablebutton.js') }}"></script>
<script src="{{ asset('assets/js/datatablebuttonprint.js') }}"></script>
<script src="{{ asset('assets/js/datatable-js.js') }}"></script>
<script src="{{ asset('assets/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/filter-multi-select-bundle.min.js') }}"></script>


<script>
   let cars = $('#mySelect2').filterMultiSelect();
 @if(Session::has('messages'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
 @if (Session::has('loggedsuccess'))
 toastr.success(" {{ Session::get('loggedsuccess') }} ");
 @endif
</script>

<script src="{{ asset('assets/js/sweetalert2@10.js') }}"></script>





