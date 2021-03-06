<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entrega;
use App\Usuario;


class Notebook extends Model
{
    protected $fillable = ['codigo', 'marca', 'modelo', 'pantalla', 'procesador', 'ram', 'hdd', 'nserie', 'estado_id', 'sistemaoperativo_id', 'mod_bateria', 'mod_cargador', 'observaciones','candado'];

    public static function activos()
    {
        return static::where('estado_id', 1)->get();
    }
    
    public static function debaja()
    {
        return static::where('estado_id', 2)->get();
    }

    public static function enrevision()
    {
        return static::where('estado_id', 3)->get();
    }
    
    public static function contingencia()
    {
        return static::where('estado_id', 4)->get();
    }

    public function sistema_operativo()
    {
        return $this->belongsTo('App\SistemaOperativo','sistemaoperativo_id');
    }

    public function mantenciones()
    {
        return $this->hasMany('App\Mantencion','codigo', 'codigo');
    }

    public function red()
    {
        return $this->hasMany('App\Red','codigo', 'codigo');
    }

    public function estado()
    {
    	return $this->belongsTo('App\Estado');
    }

    public function entregas()
    {
        return $this->hasMany('App\Entrega', 'codigo', 'codigo');
    }

    public function ultimaEntrega()
    {
        return $this->hasOne('App\Entrega', 'codigo', 'codigo')->latest(); 
    }

    public function ultimoUsuario()
    {
        //return $this->ultimaEntrega->usuario; 
    }

    public function entregaActual()
    {
        // return $this->hasOne('App\Entrega', 'codigo', 'codigo')->where('fecha_retiro',null)->latest();
        return $this->hasOne('App\Entrega', 'codigo', 'codigo')->whereNull('fecha_retiro')->latest();
    }

    public function usuarioActual()
    {
        /*if($this->entregaActual != null)
            return $this->entregaActual->usuario;
        else 
            return null;*/
        return $this->entregaActual->usuario ?? NULL;
    }

    /* Hace lo mismo que la función usuarioActual() pero se invoca como atributo*/
    /*public function getUsuarioActualAttribute()
    {
        return $this->entregaActual->usuario;
    }*/


}
