<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaran_id';

    function handleUploadFoto(){
        if(request()->hasFile('pembayaran_foto')){
            $file = request()->file('pembayaran_foto');
            $destination = "pembayaran";
            $randomStr = Str::random(5);
            $filename = "pembayaran-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->pembayaran_foto = "app/".$url;
            $this->save;
        }
    }

}
