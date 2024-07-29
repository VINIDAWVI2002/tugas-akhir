<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Modal;

class AdminModalController extends Controller
{
    function index(){
        $data['listM_modal'] = Modal::all();
        return view('admin.master-data.modal.index',$data);
    }

    function store(){
        $modal = new Modal;
        $modal->modal_jumlah = request('modal_jumlah');
        $modal->modal_deskripsi = request('modal_deskripsi');
        $modal->save();
        return back()->with('success','Modal harian berhasil dibuat');
    }
}
