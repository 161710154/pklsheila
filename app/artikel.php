<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = 'artikels';
    protected $fillable = ['judul','isi','gambar','tgl_post','status'];
    public $timestamps = true;

     public function kategori()
    {
    	return $this->hasMany('App\kategori','artikel_id');
    }

    public function komentar() 
    {
        return $this->belongsToMany('App\komentar', 'komentar_artikels', 'artikel_id', 'komentar_id');
    }
}
