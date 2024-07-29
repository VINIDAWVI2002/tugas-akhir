<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $primaryKey = 'keranjang_id';

    public function menu()    {
        return $this->belongsTo(Menu::class, 'keranjang_menu_id');
    }

}
