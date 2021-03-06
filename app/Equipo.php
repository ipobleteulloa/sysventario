<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['codigo', 'nombre', 'procesador', 'ram', 'hdd', 'placa_madre', 'ubicacion', 'sector_id', 'estado_id', 'sistemaoperativo_id', 'observaciones'];

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
	
	// public static function mostrar($codigo)
	// {
	// 	return static::where('codigo', $codigo )->first();
	// }

	public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function mantenciones()
    {
        return $this->hasMany('App\Mantencion','codigo', 'codigo');
    }
    
    public function sector()
    {
        return $this->belongsTo('App\Sector');
    }

    public function red()
    {
        return $this->hasMany('App\Red','codigo', 'codigo');
    }

    public function sistema_operativo()
    {
        return $this->belongsTo('App\SistemaOperativo','sistemaoperativo_id');
    }

}
