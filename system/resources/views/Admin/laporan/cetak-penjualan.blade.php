<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>POS VICTORIA</title>
	<!-- base:css -->
	<link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="{{url('public')}}/assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{url('public')}}/assets/css/style.css">
	<!-- endinject -->
	<link rel="shortcut icon" href="{{url('public')}}/assets/images/favicon.png" />
</head>
<body>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12">
			<div class="card equal-height">
				<div class="card-body">
					<center>
						<h3>LAPORAN PENJUALAN HARI INI</h3>
					</center>

                    <table>
						<tr>
							<th>Nama Pencetak</th>
							<td>: {{ucwords(Auth::user()->nama)}}</td>
						</tr>

						<tr>
							<th>Laporan Tanggal</th>
							<td>: {{date('d M Y')}} </td>
						</tr>
					</table>
                    
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

	<script>
		window.print();
	</script>
</body>
</html>