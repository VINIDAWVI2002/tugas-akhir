<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;


class AdminKategoriController extends Controller
{
    function index(){
        $data['list_kategori'] = Kategori::where('flag_erase',1)->get();
    	return view('admin.master-data.kategori.index',$data);
    }


    function store(){

        $kategori = new Kategori;
        $kategori->kategori_nama = request('kategori_nama');
        $kategori->handleUploadFoto();
        $kategori->save();
        
        return back()->with('success','Data kategori berhasil dibuat');
    }

    function destroy(Kategori $kategori){
        $kategori->flag_erase = 0;
        $kategori->save();
        return back()->with('warning','Data berhasil dihapus');
    }
}
