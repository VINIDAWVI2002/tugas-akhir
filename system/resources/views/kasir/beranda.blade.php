@extends('template.base-kasir')
@section('content')

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3>DETAIL PESANAN</h3>
                </center>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        @php
                    $totalHarga = 0;
                    foreach($list_pesanan as $item) {
                        $totalHarga += $item->pesanan_menu_harga * $item->pesanan_menu_qty;
                    }
                    @endphp
                        @if($totalHarga > 0)
						<form action="{{url('kasir/proses-pesanan')}}" method="post">
							@csrf

							<div class="row">
								<input type="hidden" name="pesanan_total_harga" value="{{$totalHarga}}">
								<div class="col-md-6">
									<div class="form-grpup">
										<span>Nama Pemesan</span>
										<input type="text" name="pesanan_nama" class="form-control" required placeholder="Nama Pemesan">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-grpup">
										<span>Nomor Meja</span>
										<input type="number" name="pesanan_meja_nomor" class="form-control" required min="1" placeholder="Nomor Meja">
									</div>
								</div>
							</div>
							<table class="table table-hover mt-3 table-borderless">
								<thead>
									<tr class="bg-warning">
										<th>Nama Menu</th>
										<th>Qty</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									@foreach($list_pesanan as $item)
									<tr>
										<td>{{ucwords($item->menu->menu_nama)}} <br>
											{{ucwords($item->pesanan_menu_harga)}}/Unit
										</td>
										<td>{{$item->pesanan_menu_qty}}x</td>
										<td><a href="{{url('kasir/reset-menu',$item->pesanan_detail_id)}}" class="text-danger">Hapus</a></td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									
									<tr>
										<td class="bg-dark" colspan="3">
											<h4 class="float-right font-weight text-success">Total Pesanan Rp. {{ number_format($totalHarga) }}</h4>
										</td>
									</tr>
									<tr>
										<td>
											<a href="{{url('kasir/reset-pesanan')}}" onclick="return confirm('Yakin reset pesanan?')" class="btn btn-danger btn-block btn-lg"> <i class="mdi mdi-loop"></i> Reset</a>
										</td>
										<td colspan="2">
											<button type="submit" class="btn btn-warning btn-lg  btn-block"><h4>Proses Pesanan</h4></button>
										</td>
									</tr>


									<tr>
										<td colspan="4">
										

										</td>
									</tr>
								</tfoot>
							</table>
						</form>
						@else
						<center>
							<h3>Tidak ada menu dipilih</h3>
						</center>
						@endif

                        
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <center>
                    <h3>MENU PESANAN</h3>
                </center>
            </div>
        </div>

        <div class="row mt-3">
            @foreach($menu as $item)
            <div class="col-md-4 mt-3">
				<a href="{{url('kasir/tambah',$item->menu_id)}}" style="text-decoration: none; color:#000">
                <div class="card">
                    <img src="{{asset('system/public')}}/{{$item->menu_foto}}" width="100%" height="160px" alt="">
                    <div class="card-body">
                        <center>
                            <b>{{ucwords($item->menu_nama)}} </b><br>
                           Rp. {{number_format($item->menu_harga)}}
                        </center>
                    </div>
                </div>
			</a>
            </div>
            @endforeach

            
        </div>
    </div>
</div>


@endsection