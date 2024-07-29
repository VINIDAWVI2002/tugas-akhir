<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login Admin {{ucwords($profilToko->nama_toko)}}</title>
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
  <style>
    .bg-warning{
      background-color: rgb(233, 94, 13) !important;
      color: aliceblue;
    }
  
    .btn-warning{
      background-color: rgb(233, 94, 13) !important;
      color: aliceblue;
    }
    .btn-warning:hover{
      background-color: rgb(166, 71, 16) !important;
      color: aliceblue;
    }
  </style>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="{{url('public/assets')}}/images/logo.svg" alt="logo">
              </div>
              <h4>Selamat datang admin!</h4>
              <h6 class="font-weight-light">Proses pesanan anda dengan mudah!</h6>
              <form class="pt-3" action="{{url('login-admin')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" name="password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">
                  <button class="btn btn-warning font-weight-medium auth-form-btn btn-lg btn-block">MASUK</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  @include('landing.section.js')
  
</body>

</html>
