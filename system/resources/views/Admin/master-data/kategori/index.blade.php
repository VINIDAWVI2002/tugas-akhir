@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>Data Kategori</h3>
        </center>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#exampleModal">
            Tambah Kategori
        </button>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Buat Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="{{url('admin/master-data/kategori/create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group">
                        <span>Nama Kategori</span>
                        <input type="text" class="form-control" required placeholder="Nama Kategori" name="kategori_nama">
                    </div>


                    <div class="form-group">
                        <span>Gambar Kategori</span>
                        <input type="file" accept="image/*" class="form-control" required placeholder="Nama Kategori" name="kategori_foto">
                    </div>
                
                    <div class="form-group">
                        <button class="btn btn-success btn-warning btn-block float-right" type="submit"><i class="fa fa-save"></i> SIMPAN</button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>


        <table class="table table-hover table-striped">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($list_kategori as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            <img src="{{asset('system/public')}}/{{$item->kategori_foto}}" width="100%" alt="">
                        </td>
                        <td>{{ucwords($item->kategori_nama)}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{url('admin/master-data/kategori',$item->kategori_id)}}/delete" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
@endsection