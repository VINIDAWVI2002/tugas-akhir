<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand d-inline-flex" href="{{url('/')}}"><img class="d-inline-block" src="{{url('public')}}/landing/assets/img/gallery/logo.svg" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">{{strtoupper($profilToko->nama_toko)}}</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"> </span></button>
      <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">
        <div class="mx-auto pt-5 pt-lg-0 d-block d-lg-none d-xl-block">
          <p class="mb-0 fw-bold text-lg-center">Lokasi Kami : <i class="fas fa-map-marker-alt text-warning mx-2"></i><span class="fw-normal">Ketapang, </span><span>{{$profilToko->alamat_toko}}</span></p>
        </div>
        <form class="d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0">
     
          @if(!Auth::guard('member')->check()) 
          <a href="{{url('auth/google')}}" class="btn btn-danger shadow-warning" type="submit"> <i class="fas fa-user me-2"></i>Masuk</a>
          @else
         <img src="{{Auth::guard('member')->user()->member_foto}}" style="width: 50px; height:50px ;border-radius:50%" alt=""> 
         <div class="dropdown">
          <button class="btn text-primary dropdown-toggle" type="button" style="z-index: 99999999 !important" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ucwords(Auth::guard('member')->user()->member_nama)}}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
            <a class="dropdown-item" href="{{url('profil')}}">Profil Akun</a>
            <a class="dropdown-item" href="{{url('logout')}}" onclick="return confirm('Anda yakin untuk keluar?')">Logout</a>
          </div>
        </div>
         <a href="{{url('keranjang')}}" class="btn text-primary btn-sm"><i class="mdi mdi-24px mdi-cart-outline mt-2"></i> <b style="color:red"><b>{{$keranjang_public_count}}</b></b> </a> 
          @endif
        </form>
      </div>
    </div>
  </nav>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>