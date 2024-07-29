@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <form action="{{url('admin/data-karyawan/create')}}" method="post">
            @csrf
            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Nama Karyawan</span>
                        <input type="text" required name="nama" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Email Karyawan</span>
                        <input type="text" required name="email" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Notelp Karyawan</span>
                        <input type="text" required name="notlp" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>jobdesk Karyawan</span>
                        <input type="text" required name="jobdesk" class="form-control">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <span>Sift Karyawan</span>
                        <select name="sift" id="" class="form-control">
                            <option value="Pagi - Sore" >Pagi - Sore</option>
                            <option value="Sore - Malam" >Sore - Malam</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <select name="level" id="" class="form-control" required>
                        <option value="" hidden>-- Posisi Karawan --</option>
                        <option value="1">Master Admin</option>
                        <option value="2">Kasir</option>
                        <option value="3">Pramu Saji/Koki</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <button class="btn btn-warning btn-block float-right" >TAMBAH DATA KARYAWAN</button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection