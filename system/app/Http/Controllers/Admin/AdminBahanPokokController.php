<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBahanPokokController extends Controller
{
    function index(){
        return view('admin.bahan-pokok.index');
    }
}
