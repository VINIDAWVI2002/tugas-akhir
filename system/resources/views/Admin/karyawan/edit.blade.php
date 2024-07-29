@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <form action="{{url('admin/data-karyawan',$detail->admin_id)}}/edit" method="post">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Karyawan</span>
                        <input type="text" required name="nama" class="form-control" value="{{ucwords($detail->nama)}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Email Karyawan</span>
                        <input type="text" required name="email" class="form-control" value="{{ucwords($detail->email)}}">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <span>Notelp Karyawan</span>
                        <input type="text" required name="notlp" class="form-control" value="{{ucwords($detail->notlp)}}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>jobdesk Karyawan</span>
                        <input type="text" required name="jobdesk" value="{{$detail->jobdesk}}" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Sift Karyawan</span>
                        <select name="sift" id="" class="form-control">
                            <option value="1" @if($detail->sift == 1) selected @endif>Pagi - Sore</option>
                            <option value="2" @if($detail->sift == 2) selected @endif>Sore - Malam</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <select name="level" id="" class="form-control" required>
                        <option value="" hidden>-- Posisi Karawan --</option>
                        <option value="1" @if($detail->level == 1) selected @endif>Master Admin</option>
                        <option value="2" @if($detail->level == 2) selected @endif>Kasir</option>
                        <option value="3" @if($detail->level == 3) selected @endif>Pramu Saji/Koki</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-success float-right" >TAMBAH DATA KARYAWAN</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection