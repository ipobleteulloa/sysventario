<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = ['codigo', 'usuario', 'fecha_entrega', 'fecha_retiro'];

    public function notebook()
    {
        return $this->belongsTo('App\Notebook','codigo', 'codigo');
    }
    public function usuario()
    {
    	return $this->belongsTo('App\Usuario');
    }

    public $with = ['usuario'];

    public function scopeActual($query)
    {
        return $query->where('fecha_retiro', NULL);
    }

}
