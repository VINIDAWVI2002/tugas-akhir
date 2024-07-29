<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Member;
use App\Models\Keranjang;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use Auth;

class IndexController extends Controller
{
    function index(){
        $data['list_menu'] = Menu::where('flag_erase',1)->get();
        $data['list_kategori'] = Kategori::where('flag_erase',1)->get();
        return view('landing.index',$data);
    }

    function profil(){
        $data['auth'] = Auth::guard('member')->user();
        $data['title'] = 'Profil Akun';
        return view('landing.profil',$data);
    }

    function update(){
        $auth = Auth::guard('member')->user();

        $new = request('new');
        $confirm = request('confirm');

        if($new != null){
            if($new == $confirm ){
                Member::where('member_id',$auth->member_id)->update([
                    'member_nama' => request('member_nama'),
                    'member_alamat' => request('member_alamat'),
                    'member_notlp' => request('member_notlp'),
                    'member_tanggal_lahir' => request('member_tanggal_lahir'),
                    'password' => bcrypt(request('new')),
                ]);
                return back()->with('success','Password berhasil diupdate');
            }else{
                return back()->with('danger','Password tidak sama');
            }
        }else{
            Member::where('member_id',$auth->member_id)->update([
                'member_nama' => request('member_nama'),
                'member_alamat' => request('member_alamat'),
                'member_notlp' => request('member_notlp'),
                'member_tanggal_lahir' => request('member_tanggal_lahir'),
                'member_jenis_kelamin' => request('member_jenis_kelamin'),
            ]);
        }
       return back();
    }


    function masukKeranjang(Menu $menu){
        $auth_id = Auth::guard('member')->user()->member_id;

        $cek = Keranjang::where('keranjang_menu_id',$menu->menu_id)
        ->where('keranjang_member_id', $auth_id)
        ->where('flag_erase',1)
        ->count();
    
        $stok_lama = Keranjang::where('keranjang_menu_id',$menu->menu_id)
        ->where('keranjang_member_id', $auth_id)
        ->where('flag_erase',1)
        ->first();
    
        if($cek > 0){
            Keranjang::where('keranjang_menu_id',$menu->menu_id)
            ->where('keranjang_member_id', $auth_id)
            ->where('flag_erase',1)
            ->update([
                'keranjang_qty' => 1 + $stok_lama->keranjang_qty,  
            ]);
        }else{
          $keranjang = new Keranjang;
          $keranjang->keranjang_menu_id = $menu->menu_id;
          $keranjang->keranjang_member_id = $auth_id;
          $keranjang->keranjang_qty = 1;
          $keranjang->save();  
        }
        return back()->with('success','Menu berhasil ditambahkan ke keranjang');
    }

    function keranjang(){
        $auth = Auth::guard('member')->user();
        $data['list_keranjang'] = Keranjang::where('flag_erase',1)
        ->where('keranjang_member_id',$auth->member_id)
        ->get();
        $data['title'] = 'Keranjang Anda';
        $data['list_pembayaran'] = Pembayaran::where('flag_erase',1)
        ->where('pembayaran_status',1)
        ->get();
        return view('landing.keranjang',$data);
    }

    function hapusKeranjang(Keranjang $keranjang){
        Keranjang::where('keranjang_id',$keranjang->keranjang_id)->update([
            'flag_erase' => 0,
        ]);
        return back()->with('danger','Menu berhasil dihapus dari keranjang');
    }

    function keranjangProses(Request $request){
        $auth_id = Auth::guard('member')->user()->member_id;
        $metode = request('pesanan_pembayaran_id');


        $pesan = new Pesanan;
        $pesan->pesanan_member_id = $auth_id;
        $pesan->pesanan_kode = "BG-".mt_rand(00000,99999);
        $pesan->pesanan_pembayaran_id = request('pesanan_pembayaran_id');
        $pesan->pesanan_alamat = request('pesanan_alamat');
        $pesan->pesanan_notlp = request('pesanan_notlp');
        $pesan->pesanan_pesan = request('pesanan_pesan');
        $pesan->pesanan_nama_penerima = request('pesanan_nama_penerima');
        $pesan->pesanan_tanggal = date('d');
        $pesan->pesanan_bulan = date('n');
        if($metode == 1){
            $pesan->pesanan_status = 1;
        }
        $pesan->pesanan_tahun = date('Y');
        $pesan->save();
    

        for ($i = 0; $i < count($request->keranjang_menu_id); $i++) {
                $detail = new PesananDetail;
                $detail->pesanan_id = $pesan->pesanan_id;
                $detail->pesanan_member_id = $auth_id;
                $detail->pesanan_menu_id = $request->keranjang_menu_id[$i];
                $detail->pesanan_menu_kategori_id = $request->pesanan_menu_kategori_id[$i];
                $detail->pesanan_menu_harga = $request->pesanan_menu_harga[$i];
                $detail->pesanan_menu_qty = $request->pesanan_menu_qty[$i];
                $detail->pesanan_tanggal = date('d');
                $detail->pesanan_bulan = date('n');
                $detail->pesanan_tahun = date('Y');
                $detail->save();
            }

            $url = 'invoice/'.$pesan->pesanan_id;
            return redirect($url)->with('success','Silahkan lakukan pembayaran');
        }

        function invoice(Pesanan $pesanan){
            if($pesanan->pesanan_pembayaran_id == 1){
                $pesanan->pesanan_status = 1;
            }
            $data['pesanan'] = $pesanan;
            $data['title'] = "Invoice Belanja";
            $data['list_menu'] = PesananDetail::where('pesanan_id',$pesanan->pesanan_id)->get();
            return view('landing.invoice',$data);
        }

        function uploadBukti(Pesanan $pesanan){
            $pesanan->handleUploadFoto();
            $pesanan->pesanan_total_harga = request('pesanan_total_harga');
            $pesanan->pesanan_nama_penerima = request('pesanan_nama_penerima');
            $pesanan->pesanan_status = 1;
            $pesanan->save();
            return redirect('/')->with('success','Terimakasih, pesanan anda akan segera diproses');
        }
}
