<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pembayaran;

class AdminPembayaranController extends Controller
{
    function index(){
        $data['list_pembayaran'] = Pembayaran::where('flag_erase',1)
        ->where('pembayaran_status',1)
        ->get();
        return view('admin.master-data.pembayaran.index',$data);
    }

    function store(){
        $pembayaran = new Pembayaran;
        $pembayaran->pembayaran_nama = request('pembayaran_nama');
        $pembayaran->pembayaran_nomor = request('pembayaran_nomor');
        $pembayaran->pembayaran_an = request('pembayaran_an');
        $pembayaran->handleUploadFoto();
        $pembayaran->save();
        return back()->with('success','Pembayaran berhasil dibuat');
    }

    function update(Pembayaran $pembayaran){
        $pembayaran->pembayaran_nama = request('pembayaran_nama');
        $pembayaran->pembayaran_nomor = request('pembayaran_nomor');
        $pembayaran->pembayaran_an = request('pembayaran_an');
        $pembayaran->save();
        return back()->with('success','Pembayaran berhasil diubah');
    }

    function destroy(Pembayaran $pembayaran){
        $pembayaran->flag_erase = 0;
        $pembayaran->save();
        return back()->with('warning','Data berhasil dihapus');
    }

   


}
