<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
class AdminProfilController extends Controller
{
    function index(){
        return view('admin.profil.index');
    }

    function updatePassword(){
        $new = request('new');
        $confirm = request('confirm');
        if($new == $confirm){
            Admin::where('admin_id',Auth::id())->update([
                'password' => bcrypt($new),
            ]);
            return back()->with('success','Password berhasil diganti');
        }else{
            return back()->with('warning','Password tidak sama');  
        }
       
    }
}
