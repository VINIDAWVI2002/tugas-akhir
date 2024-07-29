<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    function handleUploadFoto(){
        if(request()->hasFile('admin_foto')){
            $file = request()->file('admin_foto');
            $destination = "admin";
            $randomStr = Str::random(5);
            $filename = "admin-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->menu_foto = "app/".$url;
            $this->save;
        }
    }
   
}
