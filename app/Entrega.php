<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = ['notebook_id', 'usuario', 'fecha_entrega', 'fecha_retiro'];

    public function notebook()
    {
        return $this->belongsTo('App\Notebook','codigo', 'codigo');
    }

}
