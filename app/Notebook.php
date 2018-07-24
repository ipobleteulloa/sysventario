<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = ['usuario', 'marca', 'modelo', 'pantalla', 'procesador', 'ram', 'hdd', 'nserie', 'nserie2', 'entrega_id', 'estado_id', 'sistemaoperativo_id'];

    public function sistema_operativo()
    {
        return $this->belongsTo('App\SistemaOperativo','sistemaoperativo_id');
    }

    public function mantenciones()
    {
        return $this->hasMany('App\Mantencion','codigo', 'codigo');
    }

    public function entregas()
    {
    	return $this->hasMany('App\Entrega', 'codigo', 'codigo');
    }

    public function red()
    {
        return $this->hasMany('App\Red','codigo', 'codigo');
    }

    public function estado()
    {
    	return $this->belongsTo('App\Estado');
    }


}
