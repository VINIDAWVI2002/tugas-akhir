  <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Notifikasi -->
@foreach(['success', 'warning', 'error', 'info'] as $status)
@if (session($status))
<script>
  Swal.fire({
    icon: "{{ $status }}",
    title: "{{ Str::upper($status) }}",
    text: "{{ session($status) }}!",
    showConfirmButton: false,
    timer: 3000
})
</script>
@endif
@endforeach

    <script src="{{url('public')}}/landing/vendors/@popperjs/popper.min.js"></script>
    <script src="{{url('public')}}/landing/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{url('public')}}/landing/vendors/is/is.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{url('public')}}/landing/vendors/fontawesome/all.min.js"></script>
    <script src="{{url('public')}}/landing/assets/js/theme.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">