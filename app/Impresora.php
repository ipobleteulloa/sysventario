<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
	public static function activas()
	{
		return static::where('estado_id', 1)->get();
	}
	
	public static function debaja()
	{
		return static::where('estado_id', 2)->get();
	}
	
	public static function mostrar($codigo)
	{
		return static::where('codigo', $codigo )->first();
	}

	protected $fillable = ['codigo', 'nom_imp', 'marca', 'modelo', 'insumos', 'ubicacion', 'estado_id', 'created_at', 'updated_at', 'tipo_conexion'];

	public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
    
}