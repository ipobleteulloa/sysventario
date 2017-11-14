<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
	protected $fillable = ['nombre', 'email'];

    public function sectores()
    {
        return $this->belongsToMany('App\Sector');
    }

 
}
