@extends('template.base')
@section('content')


<div class="card">
    <div class="card-body">
        <center>
            <h3>PESANAN BARU</h3>
        </center>
    </div>
</div>
<div class="row mt-3">
    @foreach($list_pesanan as $item)
    <div class="col-md-6 mb-5">
       <div class="card border-0 shadow">
           <div class="card-body alert-success">
               <h3>{{ucwords($item->member->member_nama)}}</h3>
               <h5>#{{$item->pesanan_kode}}</h5>
               <p> Alamat : {{ucwords($item->pesanan_alamat)}} <br>
                Pesan :<b> {{$item->pesanan_pesan}} </b> <br>
                Metode Pembayaran :  <br>
                <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal{{$loop->iteration}}">
                    Bukti Pembayaran
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <img src="{{asset('system/public')}}/{{$item->pesanan_bukti}}" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</p>
<table class="table table-hover table-bordered mt-3">
   <thead>
    <tr class="bg-light">
       <th>Nama Pesanan</th>
       <th>Qty</th>
       <th>Total</th>
       <th>Grand Total</th>
   </tr>
</thead>

@foreach(App\Models\PesananDetail::where('pesanan_id',$item->pesanan_id)->get() as $menu)
<tr class="bg-light">
    <td>{{ucwords($menu->menu->menu_nama)}}</td>
    <td>{{$menu->pesanan_menu_qty}}x</td>
    <td>Rp. {{number_format($menu->pesanan_menu_harga)}}</td>
    <td>Rp. {{number_format($menu->pesanan_menu_harga * $menu->pesanan_menu_qty)}}</td>
</tr>
@endforeach
</table>

<div class="mt-3 float-right">
    <a href="{{url('admin/pesanan',$item->pesanan_id)}}/struk" target="_blank" onclick="return confirm('Yakin proses pesanan')" class="btn btn-success">Proses Pesanan</a>
    <a href="{{url('admin/pesanan',$item->pesanan_id)}}/tolak" onclick="return confirm('Yakin tolaj pesanan')" class="btn btn-danger">Tolak</a>
</div>
</div>
</div>
</div>
@endforeach
</div>

@endsection