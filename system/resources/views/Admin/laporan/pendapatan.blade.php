@extends('template.base')
@section('content')

<style>
	.equal-height {
		height: 600px; /* Adjust the height as needed */
		width: 100%;
	}
</style>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
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
</div>

<div class="row mt-5">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<div class="card equal-height">
			<div class="card-body">
				<center>
					<h3> Pendapatan Bulanan Tahun Ini</h3>
				</center>
				<canvas id="pendapatanChart"></canvas>
			</div>
		</div>
	</div>


</div>




</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
	const ctx = document.getElementById('pendapatanChart');
	const dataPendapatan = @json(array_values($data_pendapatan));
	new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
			datasets: [{
				label: 'Pendapatan Bulanan',
				data: dataPendapatan,
				borderWidth: 1,
				backgroundColor: '#D5530C',
				borderColor: '#F37505'
			}]
		},
		options: {
			scales: {
				y: {
					beginAtZero: true
				}
			}
		}
	});
</script>
@endsection
