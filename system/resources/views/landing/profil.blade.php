@extends('landing.section.base')
@section('landing')

<form action="{{url('profil/update')}}" method="get" enctype="multipart/form-data">
@csrf
<div class="row mt-5 mb-5">
    <div class="col-md-6 mt-3">
        <span>Nama</span>
        <input type="text" class="form-control" name="member_nama" required placeholder="Nama Lengkap" value="{{$auth->member_nama}}" >
    </div>

    <div class="col-md-6 mt-3">
        <span>E-Mail</span>
        <input type="text" class="form-control" name="email" value="{{$auth->email}}" readonly required placeholder="Nama Lengkap">
    </div>

    <div class="col-md-6 mt-3">
        <span>No Telp./WA</span>
        <input type="number" class="form-control" value="{{$auth->member_notlp}}" name="member_notlp" required placeholder="o Telp./WA">
    </div>

    <div class="col-md-6 mt-3">
        <span>Tanggal Lahir</span>
        <input type="date" name="member_tanggal_lahir" value="{{$auth->member_tanggal_lahir}}" required class="form-control">
    </div>

    <div class="col-md-6 mt-3">
        <span>Alamat Tinggal</span>
        <input type="text" name="member_alamat" value="{{$auth->member_alamat}}" required placeholder="Alamat/Domisili Sekarang" class="form-control">
    </div>

    <div class="col-md-6 mt-3">
        <span>Jenis Kelamin</span>
        <select name="member_jenis_kelamin" id="" class="form-control" required>
            <option value="" hidden>--Jenis Kelamin--</option>
            <option value="1" @if($auth->member_jenis_kelamin == 1) selected @endif>Laki-laki</option>
            <option value="2" @if($auth->member_jenis_kelamin == 2) selected @endif>Perempuan</option>
        </select>
    </div>

    <div class="col-md-6 mt-5">
        <span>Password Baru</span>
        <input type="password" class="form-control" name="new" placeholder="Password Baru">
    </div>

    <div class="col-md-6 mt-5">
        <span>Konfirmasi Password Baru</span>
        <input type="password" class="form-control" name="confirm" placeholder="Konfirmasi Password Baru">
    </div>


    <div class="col-md-12">
        <button class="btn btn-danger btn-block mt-5 float-right"><i class="mdi mdi-content-save"></i> Update Profil</button>
    </div>
</div>
</form>
@endsection