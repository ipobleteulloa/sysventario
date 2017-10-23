<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public function impresoras()
    {
        return $this->hasMany('App\Impresora');
    }

    public function okidatas()
    {
        return $this->hasMany('App\Okidata');
    }

    public function zebras()
    {
        return $this->hasMany('App\Zebras');
    }
}
