<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Session;
use App\Models\Member;

class AuthController extends Controller
{
    function login(Request $request){
        Auth::logout();
        Session::flush();
        Auth::guard('member')->logout();
        // Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('login')->with('success','Silahkan Masuk dahulu');
    }

    function loginAdmin(Request $request){
        Auth::logout();
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('login-admin')->with('success','Silahkan masuk terlebih dahulu');
    }

    function loginAdminProses(Request $request){
       $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
            if(Auth::user()->level == 1){
                return redirect()->intended('admin/beranda')->with('success','Selamat datang kembali'); 
            }elseif(Auth::user()->level == 2){
                return redirect()->intended('kasir/beranda')->with('success','Selamat datang kembali'); 
            }
        }else{
            return back()->with('warning','Login Gagal, Periksa email atau password anda !!');
        }
    }

    function logout(){
        Auth::logout();
        Auth::guard('member')->logout();
        return redirect('login')->with('success','Berhasil keluar');
    }

    function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login/')->withErrors('Login with Google failed');
        }
    
        $authUser = $this->findOrCreateUser($user);
         Auth::guard('member')->login($authUser, true);
        if($authUser->password == null){
            $url = '/';
            return redirect($url)->with('success','Selamat datang kembali!!!');
        };
        return redirect('/')->with('success','Selamat datang kembali');
    }


    protected function findOrCreateUser($googleUser){
        $authUser = Member::where('email', $googleUser->email)->first();
    
        if ($authUser) {
            return $authUser;
        }
        return Member::create([
            'member_nama' => $googleUser->name,
            'member_foto' => $googleUser->avatar,
            'member_login' => 1,
            'email' => $googleUser->email,
        ]);
    }

    
}
