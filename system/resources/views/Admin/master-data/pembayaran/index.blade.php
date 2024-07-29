@extends('template.base')
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
           Tambah Metoda Pembayaran
          </button>

          <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                <h5 class="modal-title" id="exampleModalLabel">Daftarkan Metode Pembayaran Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="{{url('admin/master-data/pembayaran/create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <span>Nama Metode Pembayaran</span>
                    <input type="text" class="form-control" placeholder="Nama Metode Pembayaran" name="pembayaran_nama">
                </div>

                <div class="form-group">
                    <span>Nomor Metode Pembayaran</span>
                    <input type="number" class="form-control" placeholder="Nomor Metode Pembayaran" name="pembayaran_nomor">
                </div>

                <div class="form-group">
                    <span>Nama Penerima Metode Pembayaran</span>
                    <input type="text" class="form-control" placeholder="Nama Penerima Metode Pembayaran" name="pembayaran_an">
                </div>

                <button class="btn btn-block btn-warning"><b>Daftarkan Pembayaran</b></button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <thead>
                    <tr class="bg-warning text-white">
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Metode Pembayaran</th>
                        <th>Nomor Pembayaran</th>
                        <th>Nama Penerima</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($list_pembayaran->skip(1) as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td class="btn-group">
                                <a href="{{url('admin/master-data/pembayaran',$item->pembayaran_id)}}/delete" onclick="return confirm('Yaking menghapus data ini?')" class="btn btn-danger btn-sm"><i class="mdi mdi-delete-empty"></i></a>
                                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal{{$loop->iteration}}">
                                    <i class="mdi mdi-lead-pencil"></i>
                                   </button>

                                   <div class="modal fade" id="exampleModal{{$loop->iteration}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Metode Pembayaran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{url('admin/master-data/pembayaran',$item->pembayaran_id)}}/update" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group">
                                            <span>Nama Metode Pembayaran</span>
                                            <input type="text" class="form-control" placeholder="Nama Metode Pembayaran" value="{{ucwords($item->pembayaran_nama)}}" name="pembayaran_nama">
                                        </div>
                        
                                        <div class="form-group">
                                            <span>Nomor Metode Pembayaran</span>
                                            <input type="number" class="form-control" placeholder="Nomor Metode Pembayaran" value="{{ucwords($item->pembayaran_nomor)}}" name="pembayaran_nomor">
                                        </div>
                        
                                        <div class="form-group">
                                            <span>Nama Penerima Metode Pembayaran</span>
                                            <input type="text" class="form-control" placeholder="Nama Penerima Metode Pembayaran" value="{{ucwords($item->pembayaran_an)}}" name="pembayaran_an">
                                        </div>
                        
                                        <button class="btn btn-block btn-warning"><b>Update Pembayaran</b></button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </td>
                            <td>{{ucwords($item->pembayaran_nama)}}</td>
                            <td>{{ucwords($item->pembayaran_nomor)}}</td>
                            <td>{{ucwords($item->pembayaran_an)}}</td>
                            <td>
                                @if($item->pembayaran_status == 1)
                                    <span>Aktif</span>
                                @else
                                    <span>Tidak Aktif</span>
                                 @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr class="bg-warning text-white">
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Metode Pembayaran</th>
                        <th>Nomor Pembayaran</th>
                        <th>Nama Penerima</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        
    </div>
</div>
@endsection