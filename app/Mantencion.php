<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantencion extends Model
{
    protected $table = 'mantenciones';

    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'codigo', 'codigo');
    }

}
