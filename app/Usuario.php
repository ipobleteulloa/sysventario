<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'run'];

    public function getNombreCompletoAttribute()
    {
        return ucfirst($this->nombre) . ' ' . ucfirst($this->apellidos);
    }

    public function entregas()
    {
        return $this->hasMany('App\Entrega');
    }

}


