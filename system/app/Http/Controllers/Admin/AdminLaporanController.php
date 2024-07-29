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

    // Total pendapatan dalam setahun
     $data['total_pendapatan'] = Pesanan::whereYear('created_at', $tahun)->sum('pesanan_total_harga');

    // Data pendapatan per bulan
     $monthlyData = Pesanan::whereYear('created_at', $tahun)
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
    $data['list_pesanan'] = PesananDetail::orderBy('created_at','DESC')->get();
    return view('admin.laporan.history',$data);
}

function cetakHistory(){
    $data['list_pesanan'] = PesananDetail::orderBy('created_at','DESC')->get();
    return view('admin.laporan.cetak-history',$data);
}

function cetakPenjualan(){
    $today = Carbon::today()->toDateString(); 
    $data['list_pesanan'] = PesananDetail::whereDate('created_at', $today)
    ->orderBy('created_at','DESC')->get();
    return view('admin.laporan.cetak-penjualan',$data);
}
}
