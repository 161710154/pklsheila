<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    protected $table = 'komentars';
    protected $fillable = ['isi','tgl_komentar','artikel_id'];
    public $timestamps = true;

    public function artikel()
	{
		return $this->belongsTo('App\artikel','artikel_id');
	}
}
