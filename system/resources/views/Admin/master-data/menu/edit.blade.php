@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        
        <center>
            <h3>Form Menu Makanan</h3>
        </center>

        <form action="{{url('admin/master-data/menu',$detail->menu_id)}}/edit" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Menu</span>
                        <input type="text" value="{{ucwords($detail->menu_nama)}}" required placeholder="Nama Menu" name="menu_nama" class="form-control">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Kategori Menu</span>
                        <select name="menu_kategori_id" id="" class="form-control" required>
                            <option value="" hidden>--Kategori Menu--</option>
                            @foreach ($list_kategori as $item)
                                <option value="{{$item->kategori_id}}"  @if($item->kategori_id == $detail->menu_kategori_id) selected @endif>{{ucwords($item->kategori_nama)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Status Ketersedian Menu</span>
                        <select name="menu_status" id="" class="form-control" required>
                            <option value="1" @if($item->menu_status == 1) selected @endif>Tersedia</option>
                            <option value="0" @if($item->menu_status == 0) selected @endif>Tidak Tersedia</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Harga Menu</span>
                        <input type="number" value="{{$detail->menu_harga}}" required placeholder="Harga Menu" name="menu_harga" class="form-control">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <span>Gambar Menu</span>
                        <input type="file" accept="image/*" placeholder="Harga Menu" name="menu_foto" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <img src="{{asset('system/public')}}/{{$detail->menu_foto}}" width="100%" alt="">
                </div>

                <div class="col-md-12 mt-3">
                    <button class="btn btn-success float-right" type="submit">UPDATE MENU</button>
                </div>


            </div>
        </form>
     

    </div>
</div>
@endsection