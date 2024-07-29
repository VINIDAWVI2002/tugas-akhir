@extends('template.base')
@section('content')

<div class="card">
    <div class="card-body">
        <center>
        <h1>GANTI PASSWORD</h1>
        </center>
    </div>
</div>

<div class="card mt-3">
    <div class="card-body">
        <form action="{{url('admin/update-password')}}" method="POST">
            @csrf
            @method("PUT")
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Password Baru </span>
                        <input type="password" class="form-control" name="new" required minlength="3">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <span>Konrifmasi Password Baru </span>
                        <input type="password" class="form-control" name="confirm" required minlength="3">
                    </div>
                </div>

                <div class="col-md-12 mt-3">
                    <button class="btn btn-warning">Ganti Password</button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection