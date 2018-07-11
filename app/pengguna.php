<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    protected $table = 'penggunas';
    protected $fillable = ['nama','email','judul','isi','tgl_post','gambar'];
    public $timestamps = true;

    public function artikel()
    {
    	return $this->hasMany('App\artikel','penggguna_id');
    }
}

