<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PesananDetail;
use App\Models\Pesanan;
use Carbon\Carbon;

class AdminLaporanController extends Controller
{
 function penjualan(Request $request, $tahun){
  $data['tahun_link'] = $tahun;
  $today = Carbon::today()->toDateString(); 
  $data['list_pesanan'] = PesananDetail::whereDate('created_at', $today)
  ->orderBy('created_at','DESC')->get();
  return view('admin.laporan.penjualan',$data);
}

function pendapatan(Request $request, $tahun){
 $data['tahun_link'] = $tahun;

 $data['total_pendapatan'] = Pesanan::whereYear('created_at', $tahun)->where('pesanan_status',2)->sum('pesanan_total_harga');

 $monthlyData = Pesanan::whereYear('created_at', $tahun)
 ->where('pesanan_status',2)
 ->selectRaw('MONTH(created_at) as month, SUM(pesanan_total_harga) as total')
 ->groupBy('month')
 ->pluck('total', 'month');

    // Create an array with 12 months initialized to 0
 $dataPendapatan = array_fill(1, 12, 0);

    // Fill the array with actual data
 foreach ($monthlyData as $month => $total) {
  $dataPendapatan[$month] = $total;
}

$data['data_pendapatan'] = $dataPendapatan;
$data['tahun'] = $tahun;

return view('admin.laporan.pendapatan',$data);
}

function history(){
   $now = Carbon::now(); 
   $currentMonth = $now->month;  

   $data['list_pesanan'] = PesananDetail::whereMonth('created_at', $currentMonth)
   ->where('pesanan_status','>',0)
   ->orderBy('created_at', 'DESC')
   ->get();
   return view('admin.laporan.history',$data);
}

function filterTanggal(){
   $tanggalAwal = request('tanggal_awal');
    $tanggalAkhir = request('tanggal_akhir');

    // Memastikan tanggal awal dan tanggal akhir telah diisi
     // Memastikan tanggal awal dan tanggal akhir telah diisi
    if ($tanggalAwal && $tanggalAkhir) {
        $filteredPesanan = PesananDetail::whereDate('created_at', '>=', $tanggalAwal)
            ->whereDate('created_at', '<=', $tanggalAkhir)
            ->where('pesanan_status', '>', 0)
            ->get();
    } else {
        // Jika tanggal tidak lengkap, Anda bisa melakukan handling lain, misal menampilkan semua data atau mengembalikan pesan error
        $filteredPesanan = PesananDetail::where('pesanan_status', '>', 0)
            ->get();
    }

    $data['list_pesanan'] = $filteredPesanan;
    return view('admin.laporan.history',$data);

}

function cetakHistory(){
 $data['list_pesanan'] = PesananDetail::orderBy('created_at','DESC')->where('pesanan_status','>',0)->get();
 return view('admin.laporan.cetak-history',$data);
}

function cetakPenjualan(){
 $today = Carbon::today()->toDateString(); 
 $data['list_pesanan'] = PesananDetail::whereDate('created_at', $today)
 ->where('pesanan_status','>',0)
 ->orderBy('created_at','DESC')->get();
 return view('admin.laporan.cetak-penjualan',$data);
}
}
