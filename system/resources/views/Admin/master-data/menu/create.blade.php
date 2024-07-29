@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Form Menu Makanan</h3>
        </center>
        <form action="" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Menu</span>
                        <input type="text" required placeholder="Nama Menu" name="menu_nama" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Kategori Menu</span>
                        <select name="menu_kategori_id" id="" class="form-control" required>
                            <option value="" hidden>--Kategori Menu--</option>
                            @foreach ($list_kategori as $item)
                                <option value="{{$item->kategori_id}}">{{ucwords($item->kategori_nama)}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <span>Harga Menu</span>
                        <input type="number" required placeholder="Harga Menu" name="menu_harga" class="form-control">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <span>Gambar Menu</span>
                        <input type="file" accept="image/*" required placeholder="Harga Menu" name="menu_foto" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-warning float-right btn-block" type="submit">TAMBAH MENU</button>
                </div>


            </div>
        </form>
     

    </div>
</div>
@endsection