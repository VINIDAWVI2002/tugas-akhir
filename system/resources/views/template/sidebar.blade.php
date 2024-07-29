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

<nav class="sidebar sidebar-offcanvas bg-warning" id="sidebar">
      <ul class="nav">
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/beranda')}}">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
            <div class="badge badge-info badge-pill">2</div>
          </a>
        </li>

          <li class="nav-item">
          <a class="nav-link" href="{{url('admin/pesanan')}}">
            <i class="mdi mdi-shopping menu-icon"></i>
            <span class="menu-title">Data Pesanan</span>
          </a>
        </li>

        <li class="nav-item sidebar-category">
          <p>Components</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-layers menu-icon"></i>
            <span class="menu-title">Master Data</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/master-data/menu')}}">Menu Makanan</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/master-data/kategori')}}">Kategori Menu</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/master-data/pembayaran')}}">Pembayaran</a></li>
              {{-- <li class="nav-item"> <a class="nav-link" href="{{url('admin/master-data/modal')}}">Modal Harian</a></li> --}}
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#laporan" aria-expanded="false" aria-controls="laporan">
            <i class="mdi mdi-file-document menu-icon"></i>
            <span class="menu-title">Laporan</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="laporan">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/laporan/penjualan',date('Y'))}}">Laporan Penjualan</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/laporan/pendapatan',date('Y'))}}">Laporan Pendapatan</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{url('admin/laporan/history')}}">Histor Penjualan</a></li>
            </ul>
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/data-karyawan')}}">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Data Karyawan</span>
          </a>
        </li>
     
        {{-- <li class="nav-item">
          <a class="nav-link" href="{{url('admin/bahan-pokok')}}">
            <i class="mdi mdi-bowl menu-icon"></i>
            <span class="menu-title">Data Bahan Pokok</span>
          </a>
        </li> --}}

        <li class="nav-item">
          <a class="nav-link" href="{{url('admin/profil')}}">
            <i class="mdi mdi-key-variant menu-icon"></i>
            <span class="menu-title">Ganti Password</span>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link" href="{{url('admin/profil-toko')}}">
            <i class="mdi mdi-store menu-icon"></i>
            <span class="menu-title">Profil Toko</span>
          </a>
        </li> --}}
       <!--  <li class="nav-item sidebar-category">
          <p>Pages</p>
          <span></span>
        </li> -->
       <!--  <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/login-2.html"> Login 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/register-2.html"> Register 2 </a></li>
              <li class="nav-item"> <a class="nav-link" href="pages/samples/lock-screen.html"> Lockscreen </a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item sidebar-category">
          <p>Apps</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="docs/documentation.html">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Documentation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://www.bootstrapdash.com/demo/spica/template/">
            <button class="btn bg-danger btn-sm menu-title">Upgrade to pro</button>
          </a>
        </li> -->
      </ul>
    </nav>