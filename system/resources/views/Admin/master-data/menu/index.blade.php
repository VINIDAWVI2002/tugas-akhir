@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Menu Makanan</h3>
        </center>

     <a href="{{url('admin/master-data/menu/create')}}" class="btn btn-warning float-right">Tambah Menu Baru</a>


    </div>
</div>

    <div class="row mt-3">
        @foreach($list_menu as $item)
            <div class="col-md-4">
                <img src="{{asset('system/public')}}/{{$item->menu_foto}}" width="100%" height="250px" alt=""> <br>
                <div class="card">
                    <div class="card-body">
                   <b>{{ucwords($item->menu_nama)}}</b>
                   <p>Rp.{{number_format($item->menu_harga)}}</p>
                  <div class="float-right">
                   @if($item->menu_status == 1)
                       <b class="text-success"> Tersedia</b>
                       
                   @else
                      <b class="text-danger">Tidak Tersedia</b> 
                   @endif
<br>
                   <a href="{{url('admin/master-data/menu',$item->menu_id)}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                   <a href="{{url('admin/master-data/menu',$item->menu_id)}}/edit" class="btn btn-dark btn-sm" >Edit</a>
                </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection