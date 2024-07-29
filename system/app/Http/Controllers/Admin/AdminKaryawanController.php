<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Admin;

class AdminKaryawanController extends Controller
{
    function index(){
        $data['list_karyawan'] = Admin::where('flag_erase',1)->get();
        return view('admin.karyawan.index',$data);
    }

    function create(){
        return view('admin.karyawan.create');
    }

    function store(){

        $karyawan = new Admin;
        $karyawan->nama = request('nama');
        $karyawan->notlp = request('notlp');
        $karyawan->sift = request('sift');
        $karyawan->email = request('email');
        $karyawan->jobdesk = request('jobdesk');
        $karyawan->level = request('level');
        $karyawan->password = bcrypt('123');
        $karyawan->save();

        return redirect('admin/data-karyawan')->with('success','data karyawan berhasil dibuat, passsword default 123');
    }

    function edit(Admin $admin){
        $data['detail'] = $admin;
        return view('admin.karyawan.edit',$data);
    }

    function update(Admin $admin){
       $admin->nama = request('nama');
       $admin->notlp = request('notlp');
       $admin->sift = request('sift');
       $admin->email = request('email');
       $admin->jobdesk = request('jobdesk');
       $admin->level = request('level');
       $admin->save();

       return redirect('admin/data-karyawan')->with('success','data karyawan berhasil diupdate');
   }

   function destroy(Admin $admin){
    $admin->flag_erase = 0;
    $admin->save();
    return back()->with('warning','berhasil dihapus');
   }
}
