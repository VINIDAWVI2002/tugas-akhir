<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{strtoupper($profilToko->nama_toko)}}</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('public')}}/landing/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('public')}}/landing/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public')}}/landing/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('public')}}/landing/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="{{url('public')}}/landing/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{url('public')}}/landing/assets/css/theme.css" rel="stylesheet" />

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
     @include('landing.section.navbar')
      <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="#!"><img class="img-fluid" src="{{url('public')}}/landing/assets/img/gallery/hero-header.png" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
              <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Butuh Makanan?</h1>
              <h1 class="text-800 mb-5 fs-4 ">{{ucwords($profilToko->nama_toko)}} menyediakan makanan <br> yang kamu inginkan</h1>
              <div class="card w-xxl-75">
                <div class="card-body">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fas fa-motorcycle me-2"></i>Delivery</button>
                      <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fas fa-shopping-bag me-2"></i>Pickup</button>
                    </div>
                  </nav>
                  <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <form class="row gx-2 gy-2 align-items-center">
                        <div class="col">
                          <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                            <label class="visually-hidden" for="inputDelivery">Address</label>
                            <input class="form-control input-box form-foodwagon-control" id="inputDelivery" type="text" placeholder="Enter Your Address" />
                          </div>
                        </div>
                        <div class="d-grid gap-3 col-sm-auto">
                          <button class="btn btn-danger" type="submit">Find Food</button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      <form class="row gx-4 gy-2 align-items-center">
                        <div class="col">
                          <div class="input-group-icon"><i class="fas fa-map-marker-alt text-danger input-box-icon"></i>
                            <label class="visually-hidden" for="inputPickup">Address</label>
                            <input class="form-control input-box form-foodwagon-control" id="inputPickup" type="text" placeholder="Enter Your Address" />
                          </div>
                        </div>
                        <div class="d-grid gap-3 col-sm-auto">
                          <button class="btn btn-danger" type="submit">Find Food</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
       
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      {{-- <section class="py-0 bg-primary-gradient">

        <div class="container">
          <div class="row justify-content-center g-0">
            <div class="col-xl-9">
              <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">Layanan Kami</h5>
              </div>
              <div class="row">
                <div class="col-sm-6 col-md-3 mb-6">
                  <div class="text-center"><img class="shadow-icon" src="{{url('public')}}/landing/assets/img/gallery/location.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">Beranda</h5>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 mb-6">
                  <div class="text-center"><img class="shadow-icon" src="{{url('public')}}/landing/assets/img/gallery/order.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">Menu </h5>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 mb-6">
                  <div class="text-center"><img class="shadow-icon" src="{{url('public')}}/landing/assets/img/gallery/pay.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">Keranjag</h5>
                  </div>
                </div>

                <div class="col-sm-6 col-md-3 mb-6">
                  <div class="text-center"><img class="shadow-icon" src="{{url('public')}}/landing/assets/img/gallery/meals.png" height="112" alt="..." />
                    <h5 class="mt-4 fw-bold">History Pesanan</h5>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div><!-- end of .container-->

      </section> --}}
      <!-- <section> close ============================-->
      <!-- ============================================-->





      <section id="testimonial">
        <div class="container">
          <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Menu Makana & Minuman</h5>
            </div>
          </div>
          <div class="row gx-2">

            @foreach(App\Models\Kategori::all() as $kategori)
            <h3>{{ucwords($kategori->kategori_nama)}}</h3>
            @foreach(App\Models\Menu::where('menu_kategori_id',$kategori->kategori_id)->get() as $item)
              <div class="col-sm-6 col-md-3 col-lg-3 h-100 mb-5 mt-3">
              <div class="card card-span h-100 text-white rounded-3"><img class="img-fluid rounded-3 h-100" style="height: 350px !important" src="{{asset('system/public')}}/{{$item->menu_foto}}" alt="..." />
                <div class="card-img-overlay ps-0"><span class="badge bg-danger p-2 ms-3"><i class="fas fa-tag me-2 fs-0"></i><span class="fs-0">Rp. {{number_format($item->menu_harga)}}</span></span></div>
                <div class="card-body ps-0">
                  <div class="d-flex align-items-center mb-3"><img class="img-fluid" src="{{asset('system/public')}}/landing/assets/img/gallery/food-world-logo.png" alt="" />
                    <div class="flex-1 ms-3">
                      <h5 class="mb-0 fw-bold text-1000">{{ucwords($item->menu_nama)}}</h5>
                    </div>
                  </div>
                </div>
              </div>
              <a href="{{url('masuk-keranjang',$item->menu_id)}}" class="btn btn-lg btn-danger btn-block"><i class="mdi mdi-cart"></i> Masuk Keranjang</a>
            </div>
            @endforeach
            @endforeach

          </div>
        </div>
      </section>


      <section>
        <div class="bg-holder" style="background-image:url(assets/img/gallery/cta-one-bg.png);background-position:center;background-size:cover;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xxl-10">
              <div class="card card-span shadow-warning" style="border-radius: 35px;">
                <div class="card-body py-5">
                  <div class="row justify-content-evenly">
                    <div class="col-md-3">
                      <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="{{url('public')}}/landing/assets/img/icons/discounts.png" width="100" alt="..." />
                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                          <h2 class="fw-bolder text-1000 mb-0 text-gradient">Daily<br class="d-none d-md-block" />Discounts </h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 hr-vertical">
                      <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="{{url('public')}}/landing/assets/img/icons/live-tracking.png" width="100" alt="..." />
                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                          <h2 class="fw-bolder text-1000 mb-0 text-gradient">Live Tracking</h2>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 hr-vertical">
                      <div class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between"><img src="{{url('public')}}/landing/assets/img/icons/quick-delivery.png" width="100" alt="..." />
                        <div class="d-flex d-lg-block d-xl-flex flex-center">
                          <h2 class="fw-bolder text-1000 mb-0 text-gradient">Quick Delivery </h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->

      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




  @include('landing.section.js')
  </body>

</html>