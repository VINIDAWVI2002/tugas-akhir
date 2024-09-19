<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>POS VICTORIA</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('public')}}/assets/images/favicon.png" />
</head>
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    @include('template.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
            {{-- logo --}}
            {{-- <a class="navbar-brand brand-logo" href="index.html"><img src="{{url('public')}}/assets/images/logo.svg" alt="logo"/></a> --}}
            {{-- <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{url('public')}}/assets/images/logo-mini.svg" alt="logo"/></a> --}}
            {{-- end logo --}}
          </div>
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1 ml-3">Welcome back, {{ucwords(Auth::user()->nama)}}</h4>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              {{-- <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{date('d D M Y')}}</h4> --}}
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
          <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
              <div class="input-group">
                {{-- <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search"> --}}
              </div>
            </li>
          </ul>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              
                <span class="nav-profile-name">Masuk Sebagai : {{ucwords(Auth::user()->nama)}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="{{url('admin/profil')}}" >
                  <i class="mdi mdi-settings text-primary"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="{{url('logout')}}" onclick="return confirm('Yakin untuk keluar?')">
                  <i class="mdi mdi-logout text-primary"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{url('public')}}/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{url('public')}}/assets/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('public')}}/assets/js/off-canvas.js"></script>
  <script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
  <script src="{{url('public')}}/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{url('public')}}/assets/js/dashboard.js"></script>
 <script src="{{url('public')}}/assets/js/swet.js"></script>
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
  
</body>

</html>