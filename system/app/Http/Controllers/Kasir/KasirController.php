<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\PesananDetail;
use App\Models\Pesanan;
use Auth;
use Carbon\Carbon;

class KasirController extends Controller
{
    function beranda(){
        $auth = Auth::id();
        $data['menu'] = Menu::where('flag_erase',1)
        ->where('menu_status',1)
        ->get();
        $data['list_pesanan'] = PesananDetail::where('pesanan_status',0)
        ->where('kasir_id',$auth)
        ->get();


        return view('kasir.beranda',$data);
    }

    function tambah(Menu $menu){
        $cek = PesananDetail::where('pesanan_menu_id',$menu->menu_id)
        ->where('pesanan_status',0)
        ->count();

        $getData = PesananDetail::where('pesanan_menu_id',$menu->menu_id)
        ->where('pesanan_status',0)
        ->first();

        if($cek == 0){
            $pesanan = new PesananDetail;
            $pesanan->pesanan_menu_id = $menu->menu_id;
            $pesanan->pesanan_menu_kategori_id = $menu->menu_kategori_id;
            $pesanan->pesanan_menu_harga = $menu->menu_harga;
            $pesanan->pesanan_menu_qty = 1;
            $pesanan->pesanan_tanggal = date('d');
            $pesanan->pesanan_bulan = date('n');
            $pesanan->pesanan_tahun = date('Y');
            $pesanan->kasir_id = Auth::id();
            $pesanan->save();
      
        }else{
            PesananDetail::where('pesanan_menu_id',$menu->menu_id)
            ->where('pesanan_status',0)
            ->where('kasir_id',Auth::id())
            ->update([
                'pesanan_menu_qty' => $getData->pesanan_menu_qty +1
            ]); 
        }

        return back();       
    }


    function prosesPesanan(){
        $pesanan = new Pesanan;
        $pesanan->pesanan_member_id = 0;
        $pesanan->pesanan_nama_penerima = request('pesanan_nama');
        $pesanan->pesanan_nama = request('pesanan_nama');
        $pesanan->pesanan_kode = "BG-".mt_rand(00000,99999);
        $pesanan->pesanan_meja_nomor = request('pesanan_meja_nomor');
        $pesanan->pesanan_total_harga = request('pesanan_total_harga');
        $pesanan->pesanan_alamat = "Makan Ditempat";
        $pesanan->pesanan_pembayaran_id = 1;
        $pesanan->pesanan_tanggal = date('d');
        $pesanan->pesanan_bulan = date('m');
        $pesanan->pesanan_tahun = date('Y');
        $pesanan->pesanan_status = 2;
        $pesanan->save();

        PesananDetail::where('pesanan_status',0)
        ->where('kasir_id',Auth::id())
        ->update([
            'pesanan_id' => $pesanan->pesanan_id,
            'pesanan_status' => 1,
        ]); 
        $url = 'cetak/'.$pesanan->pesanan_id.'/struk';
        $script = '<script>window.open("'.$url.'", "_blank");</script>';
        return redirect()->back()->with('script', $script)->with('success','Pesanan berhasil di proses');
    }

    function cetak(Pesanan $pesanan){
        $data['pesanan'] = $pesanan;
        $data['list_pesanan'] = PesananDetail::where('pesanan_id', $pesanan->pesanan_id)->get();
        return view('kasir.cetak', $data);
    } 
     function resetPesanan(){
        PesananDetail::where('pesanan_status',0)
        ->where('kasir_id',Auth::id())
        ->delete();
        return back()->with('success','Menu berhasil direset');
    }

    function resetMenu(PesananDetail $pesanandetail){
        PesananDetail::where('pesanan_detail_id',$pesanandetail->pesanan_detail_id)
        ->delete();
        return back();
    }

    function tutupBuku(){
        $today = Carbon::today()->toDateString(); // Ambil tanggal hari ini dalam format YYYY-MM-DD
        $data['auth'] = Auth::user();
        $data['list_pesanan'] = PesananDetail::whereDate('created_at', $today)
                                ->where('kasir_id', Auth::id())
                                ->get();
        return view('kasir.tutupbuku',$data);
    }


    // pesanan
    function indexPesanan(){
        $data['list_pesanan'] = Pesanan::where('pesanan_status',1)->get();
        return view('kasir.pesanan',$data);
    }

    function proses(Pesanan $pesanan){
        $pesanan->pesanan_status = 2;
        $pesanan->save();

        PesananDetail::where('pesanan_id',$pesanan->pesanan_id)->update([
            'pesanan_status' => 1,
        ]);

        $url = 'admin/pesanan/'.$pesanan->pesanan_id.'/struk';
        $script = '<script>window.open("'.$url.'", "_blank");</script>';
        return redirect()->back()->with('success','Pesanan berhasil di proses')->with('script', $script);
    }

    function struk(Pesanan $pesanan){
        $data['detail'] = $pesanan;
        $pesanan->pesanan_status = 2;
        $pesanan->save();
          PesananDetail::where('pesanan_id',$pesanan->pesanan_id)->update([
            'pesanan_status' => 1,
        ]);
        $data['list_pesanan'] = PesananDetail::where('pesanan_id',$pesanan->pesanan_id)->get();
        return view('admin.pesanan.struk',$data);
    }

}
