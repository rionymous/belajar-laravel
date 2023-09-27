<!-- General JS Scripts -->
<script src="{{ asset('modules/chart.min.js') }}"></script>
<script src="{{ asset('modules/gmaps.js') }}"></script>
<script src="{{ asset('modules/jquery.min.js') }}"></script>
<script src="{{ asset('modules/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('modules/moment.min.js') }}"></script>
<script src="{{ asset('modules/popper.js') }}"></script>
<script src="{{ asset('modules/sticky-kit.js') }}"></script>
<script src="{{ asset('modules/tooltip.js') }}"></script>
  <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('modules/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('modules/chart.min.js') }}"></script>
<script src="{{ asset('modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
<script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="{{ asset('modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('modules/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('modules/cleave-js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('modules/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ asset('modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('modules/izitoast/js/iziToast.min.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('js/page/index.js') }}"></script>
<script src="{{ asset('js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('js/page/auth-register.js') }}"></script>
<script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
<script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
  <script src="{{ asset('js/page/modules-toastr.js') }}"></script>

<script src="{{ asset('js/bundle.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/stisla.js') }}"></script>
@if(session('notification'))
    <script>
      iziToast.success({
        title: "{{ session('notification.title') }}",
        message: "{{ session('notification.message') }}",
        position: "{{ session('notification.position') }}"
      });
    </script>
  @endif

