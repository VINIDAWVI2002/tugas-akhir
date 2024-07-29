<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;

use Illuminate\Support\Facades\Validator;

class AdminMenuController extends Controller
{
    function index(){
        $data['list_menu'] = menu::where('flag_erase',1)->get();
        return view('admin.master-data.menu.index',$data);
    }

    function create(){
        $data['list_kategori'] = Kategori::where('flag_erase',1)->get();
        return view('admin.master-data.menu.create',$data);
    }

    function store(Request $request){

        $validator = Validator::make($request->all(), [
            'menu_nama' => 'required',
            'menu_harga' => 'required',
        ]);

        $menu = new menu;
        $menu->menu_nama = request('menu_nama');
        $menu->menu_harga = request('menu_harga');
        $menu->menu_kategori_id = request('menu_kategori_id');
        $menu->handleUploadFoto();
        $menu->save();

        return back()->with('success','Menu berhasil ditambahkan');
    }

    function show(Menu $menu){
        $data['detail'] = $menu;
        $data['list_kategori'] = Kategori::where('flag_erase',1)->get();
        return view('admin.mastr-data.menu.show',$data);
    }

    function edit(Menu $menu){
        $data['detail'] = $menu;
        $data['list_kategori'] = Kategori::where('flag_erase',1)->get();
        return view('admin.master-data.menu.edit',$data);
    }

    function update(Menu $menu){
        $menu->menu_nama = request('menu_nama');
        $menu->menu_harga = request('menu_harga');
        $menu->menu_kategori_id = request('menu_kategori_id');
        $menu->menu_status = request('menu_status');
        $menu->handleUploadFoto();
        $menu->save();

        return redirect('admin/master-data/menu')->with('success','Data berhasil diupdate');
    }


    function destroy(Menu $menu){
        $menu->flag_erase = 0;
        $menu->save();
        return back()->with('warning','data berhasil dihapus');
    }
}
