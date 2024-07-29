@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
            <h3>DATA KARYAWAN VICTORIA</h3>
        </center>

        <a href="{{url('admin/data-karyawan/create')}}" class="btn float-right mb-5 btn-warning">TAMBAH KARYAWAN</a>


        <table class="table table-hover table-striped table-bordered mt-3">
            <thead>
                <tr class="bg-warning">
                    <th>No</th>
                    <th>Aksi</th>
                    <th>Nama Karyawan</th>
                    <th>E-Mail</th>
                    <th>No Telp</th>
                    <th>Jobs</th>
                    <th>Shift</th>
                </tr>
            </thead>

            @foreach ($list_karyawan->skip(1) as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <a href="{{url('admin/data-karyawan',$item->admin_id)}}/edit" class="btn btn-dark"><i class="mdi mdi-lead-pencil"></i></a>
                        <a href="{{url('admin/data-karyawan',$item->admin_id)}}/delete" class="btn btn-danger" onclick="return confirm('Yakin menghapus data ini?')"><i class="mdi mdi-delete"></i></a>
                    </td>
                    <td>{{ucwords($item->nama)}}</td>
                    <td>{{ucwords($item->email)}}</td>
                    <td>{{ucwords($item->notlp)}}</td>
                    <td>{{ucwords($item->jobdesk)}}</td>
                    <td>{{ucwords($item->sift)}}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection