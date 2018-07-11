<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['news','populer','fashion','kpop','infotainment','artikel_id'];
    public $timestamps = true;

     public function artikel()
	{
		return $this->belongsTo('App\artikel','artikel_id');
	}
}
