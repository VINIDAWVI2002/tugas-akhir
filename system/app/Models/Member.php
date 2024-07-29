<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'member';
    protected $primaryKey = 'member_id';

    protected $fillable = [
        'member_id',
        'member_nama',
        'member_alamat',
        'member_jenis_kelamin',
        'member_tanggal_lahir',
        'member_foto',
        'email',
        'member_notlp',
        'password',
        'flag_erase',
    ];

    function handleUploadFoto(){
        if(request()->hasFile('member_foto')){
            $file = request()->file('member_foto');
            $destination = "member";
            $randomStr = Str::random(5);
            $filename = "member-".time()."-".$randomStr.".".$file->extension();
            $url = $file->storeAs($destination, $filename);
            $this->menu_foto = "app/".$url;
            $this->save;
        }
    }
   
}
