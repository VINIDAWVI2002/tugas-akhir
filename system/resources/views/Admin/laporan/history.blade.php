@extends('template.base')
@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">
{{-- <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
	<div class="btn-group btn-block mr-2" role="group" aria-label="First group">
		<button type="button" class="btn btn-warning">Semua</button>
		<button type="button" class="btn btn-warning">Januari</button>
		<button type="button" class="btn btn-warning">Februari</button>
		<button type="button" class="btn btn-warning">Maret</button>
		<button type="button" class="btn btn-warning">April</button>
		<button type="button" class="btn btn-warning">Mei</button>
		<button type="button" class="btn btn-warning">Juni</button>
		<button type="button" class="btn btn-warning">Juli</button>
		<button type="button" class="btn btn-warning">Agustus</button>
		<button type="button" class="btn btn-warning">September</button>
		<button type="button" class="btn btn-warning">Oktober</button>
		<button type="button" class="btn btn-warning">November</button>
		<button type="button" class="btn btn-warning">Desember</button>
		<div class="btn-group" role="group">
			<button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Periode {{$tahun_link}}
			</button>
			<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
				@php
				$year = date('Y');
				@endphp
				<a class="dropdown-item @if($tahun_link == date('Y')) active @endif" href="{{url('admin/laporan/pendapatan',$year)}}">{{date('Y')}}</a>
				<a class="dropdown-item @if($tahun_link == $year-1) active @endif" href="{{url('admin/laporan/pendapatan',$year-1)}}">{{$year-1}}</a>
				<a class="dropdown-item @if($tahun_link == $year-2) active @endif" href="{{url('admin/laporan/pendapatan',$year-2)}}">{{$year-2}}</a>
			</div>
		</div>
	</div>
</div> --}}

<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<div class="card equal-height">
			<div class="card-body">
				<center>
					<h3>LAPORAN PENJUALAN BULAN INI</h3>
				</center>
				<a href="{{url('admin/laporan/cetak-history')}}" target="_blank" class="btn btn-sm btn-dark"><i class="mdi mdi-printer"></i> Cetak</a>
				<table class="table table-bordered table-striped mt-3" id="example">
					<thead>
						<tr class="font-weight bg-warning text-white">
							<th width="50px">No</th>
							<th>Nama Kasir</th>
							<th>Nama Menu</th>
							<th>Qty</th>
							<th>Harga</th>
							<th>Grand Total</th>
							<th>Waktu Pesanan</th>
						</tr>
					</thead>
					@php
						$totalHarga = 0;
						foreach($list_pesanan as $item) {
							$totalHarga += $item->pesanan_menu_harga * $item->pesanan_menu_qty;
						}
						@endphp
					@foreach($list_pesanan as $item)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{ucwords($item->kasir->nama ?? "Pesan Online")}}</td>
						<td>{{ucwords($item->menu->menu_nama)}}</td>
						<td>{{$item->pesanan_menu_qty}}x</td>
						<td>Rp. {{$item->pesanan_menu_harga}}</td>
						<td>Rp. {{number_format($item->pesanan_menu_qty * $item->pesanan_menu_harga)}}</td>
						<td>{{$item->created_at}}</td>
					</tr>
	
					@endforeach
					<tr>
						<td colspan="5"><h3>TOTAL PENDAPATAN :</h3></td>
						<td colspan="2"><h3>Rp. {{number_format($totalHarga)}}</h3></td>
					</tr>
				</table>
			</div>
		</div>
	</div>


</div>

@endsection
