<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zebras extends Model
{
    public static function activas()
	{
		return static::where('estado', 1)->get();
	}
	
	public static function debaja()
	{
		return static::where('estado', 2)->get();
	}
	
	public static function mostrar($codigo)
	{
		return static::where('codigo', $codigo )->first();
	}

	protected $fillable = ['codigo', 'nom_zebra', 'modelo', 'ubicacion', 'estado_id', 'created_at', 'updated_at', 'tipo_conexion'];

	public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
    
}
