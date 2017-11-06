<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $table = 'sectores';
    protected $fillable = ['nombre'];

    public function equipos()
    {
        return $this->hasMany('App\Equipo');
    }

    /*public function impresoras()
    {
        return $this->hasMany('App\Impresora');
    }*/

    public function okidatas()
    {
        return $this->hasMany('App\Okidata');
    }

    /*public function zebras()
    {
        return $this->hasMany('App\Zebras');
    }*/
}
