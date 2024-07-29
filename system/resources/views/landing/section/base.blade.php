<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{strtoupper($profilToko->nama_toko)}}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('public')}}/landing/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('public')}}/landing/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public')}}/landing/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public')}}/landing/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="{{url('public')}}/landing/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link href="{{url('public')}}/landing/assets/css/theme.css" rel="stylesheet" />
  </head>


  <body>
    <main class="main" id="top">
     @include('landing.section.navbar')
 

      <section class="py-0 mt-5 bg-primary-gradient">

        <div class="container">
          <div class="row justify-content-center g-0">
            <div class="col-xl-9">
              <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">{{$title}}</h5>
              </div>
                 @yield('landing')
            </div>
          </div>
        </div>

      </section>

 
    </main>

    @include('landing.section.js')
</body>

</html>