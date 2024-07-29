<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';
    protected $with = ['pembayaran','member'];

    public function pembayaran()    {
        return $this->belongsTo(Pembayaran::class, 'pesanan_pembayaran_id');
    }

      public function member()    {
        return $this->belongsTo(Member::class, 'pesanan_member_id');
    }

    
        function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $file = request()->file('foto');
            $destination = "bukti";
            $randomStr = Str::random(5);
            $filename = "bukti-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->pesanan_bukti = "app/".$url;
            $this->save;
        }
      }
    

}
