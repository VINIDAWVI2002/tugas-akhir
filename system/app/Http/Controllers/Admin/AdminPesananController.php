<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
class AdminPesananController extends Controller
{
    function index(){
        $data['list_pesanan'] = Pesanan::where('pesanan_status',1)->get();
        return view('admin.pesanan.index',$data);
    }

    function proses(Pesanan $pesanan){
        $pesanan->pesanan_status = 2;
        $pesanan->save();

        PesananDetail::where('pesanan_id',$pesanan->pesanan_id)->update([
            'pesanan_status' => 2,
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
            'pesanan_status' => 2,
        ]);
        $data['list_pesanan'] = PesananDetail::where('pesanan_id',$pesanan->pesanan_id)->get();
        return view('admin.pesanan.struk',$data);
    }
}
