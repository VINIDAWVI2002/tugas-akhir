<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';

    function handleUploadFoto(){
        if(request()->hasFile('kategori_foto')){
            $file = request()->file('kategori_foto');
            $destination = "kategori";
            $randomStr = Str::random(5);
            $filename = "kategori-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->kategori_foto = "app/".$url;
            $this->save;
        }
    }

}
