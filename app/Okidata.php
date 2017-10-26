<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Okidata extends Model
{
    public static function activas()
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
	
	public static function mostrar($codigo)
	{
		return static::where('codigo', $codigo )->first();
	}

	protected $fillable = ['codigo', 'nombre', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id', 'created_at', 'updated_at'];

	public function estado()
    {
        return $this->belongsTo('App\Estado');
    }

    public function mantenciones()
    {
        return $this->hasMany('App\Mantencion','codigo', 'codigo');
    }
    
}
