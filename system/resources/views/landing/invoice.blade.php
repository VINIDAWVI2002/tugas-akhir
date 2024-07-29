@extends('landing.section.base')
@section('landing')

<div class="row mb-5">
    <div class="col-md-12">
        <h3 class="text-primary">Kode Pesanan : {{$pesanan->pesanan_kode}}</h3>
    </div>
    <div class="col-md-7">
        Nama Penerima : {{ucwords($pesanan->pesanan_nama_penerima)}} <br>
        Alamat Penerima : {{ucwords($pesanan->pesanan_alamat)}} <br>
        No Telp. Penerima : {{ucwords($pesanan->pesanan_notlp)}} <br>
        Dipesan pada : {{$pesanan->created_at}}

        <table class="table mt-3 table-borderless table-sm">
            <thead>
                <tr class="bg-primary">
                    <th class="text-center d">No</th>
                    <th>Nama Menu</th>
                    <th class="text-center">Harga Menu</th>
                    <th class="text-center" width="250px">Qty</th>
                    <th class="text-center">Grandtotal</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list_menu as $item)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ucwords($item->menu->menu_nama)}}</td>
                    <td class="text-center">Rp. {{number_format($item->pesanan_menu_harga)}}</td>
                    <td class="text-center">{{ucwords($item->pesanan_menu_qty)}} x</td>
                    <td class="text-center">Rp. {{number_format($item->pesanan_menu_harga * $item->pesanan_menu_qty)}}</td>
                </tr>
                @endforeach
            </tbody>


            <tr class="bg-warning">
                <th colspan="4">
                    Total Belanja :
                </th>
                <th class="text-center" >

                    @php
                    $total = 0;
                    foreach($list_menu as $item) {
                        $subtotal = $item->pesanan_menu_harga * $item->pesanan_menu_qty ;
                        $total += $subtotal;
                    }
                    echo "Rp. " . number_format($total);
                    @endphp

                </th>
            </tr>
        </table>
    </div>

    <div class="col-md-5">
      <p>Silahkan lakukan pembayaran sebesar  <?php
      $total = 0;
      foreach($list_menu as $item) {
        $subtotal = $item->pesanan_menu_harga * $item->pesanan_menu_qty;
        $total += $subtotal;
    }
?> <b>Rp. {{number_format($total)}}</b> ke <b>
    @if($pesanan->pesanan_pembayaran_id == 1)
    Kurir 
    @else
    {{ucwords($pesanan->pembayaran->pembayaran_nama)}}
  
</b>
dengan nomor pembayaran sebagai berikut : <br> <br>
No Pembayaran : <b>{{$pesanan->pembayaran->pembayaran_nomor}}</b>  <br>  
Nama Penerima : <b>{{$pesanan->pembayaran->pembayaran_an ?? Auth::guard('member')->user()->member_nama}}</b>  <br>  <br>
Jika telah selesai silahkan upload bukti pembayaran anda ke form dibawah ini dalam bentuk gambar. <br>

<form action="{{url('upload-bukti',$pesanan->pesanan_id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="form-group mb-3">
        <span>Nama Penerima Pesanan</span>
        <input type="text" class="form-control" name="pesanan_nama_penerima" required value="{{ucwords(Auth::guard('member')->user()->member_nama)}}">
    </div>
    <span>Bukti Pembayaran</span>
    <input type="hidden" value="{{$total}}" name="pesanan_total_harga">
    <input type="file" accept="image/*" name="foto" class="form-control">
    <button class="btn btn-primary mt-3">Lanjut Pesan</button>
</form>
@endif

</p>
</div>
</div>


@endsection