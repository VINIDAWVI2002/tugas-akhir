<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Carbon\Carbon;
use DB;

class AdminController extends Controller
{
  public function beranda()
  {   
    $today = Carbon::today()->toDateString();

    $data['pendapatan'] = Pesanan::whereDate('created_at', $today)
    ->where('pesanan_status',2)
    ->sum('pesanan_total_harga');

    $data['totalPesanan'] = Pesanan::whereDate('created_at', $today)
     ->where('pesanan_status',2)
    ->count();

    $data['pesananBaru'] = Pesanan::where('pesanan_status', 1)
    ->whereDate('created_at', $today)
    ->count();

    $sevenDaysAgo = Carbon::today()->subDays(7)->toDateString();
    $dailyData = Pesanan::where('created_at', '>=', $sevenDaysAgo)
    ->where('pesanan_status',2)
    ->selectRaw('DATE(created_at) as date, SUM(pesanan_total_harga) as total')
    ->groupBy('date')
    ->pluck('total', 'date');

    $dataPendapatanHarian = array_fill(0, 7, 0);
    $dates = [];

    for ($i = 6; $i >= 0; $i--) {
      $date = Carbon::now()->subDays($i)->format('Y-m-d');
      $dates[] = $date;
      $dataPendapatanHarian[6 - $i] = $dailyData[$date] ?? 0;
    }

    $data['data_pendapatan_harian'] = $dataPendapatanHarian;
    $data['dates'] = $dates;

    $data['tahun'] = Carbon::now()->year; 

  $topMenus = PesananDetail::where('pesanan_menu_kategori_id',1)
  ->where('pesanan_status','>',0)
  ->with('menu')
    ->select('pesanan_menu_id', DB::raw('SUM(pesanan_menu_qty) as total'))
    ->groupBy('pesanan_menu_id')
    ->orderBy('total', 'desc')
    ->take(5)
    ->get();

    $data['topMenus'] = $topMenus;

    return view('admin.beranda', $data);
  }
}
