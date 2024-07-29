<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class PesananDetail extends Model
{
    use HasFactory;
    protected $table = 'pesanan_detail';
    protected $primaryKey = 'pesanan_detail_id';
    protected $with = ['menu','pesanan'];

    public function menu(){
        return $this->belongsTo(Menu::class, 'pesanan_menu_id');
    }
    
    public function pesanan(){
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function kasir(){
        return $this->belongsTo(Admin::class, 'kasir_id');
    }

}
