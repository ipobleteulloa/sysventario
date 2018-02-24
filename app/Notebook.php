<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notebook extends Model
{
    protected $fillable = ['usuario', 'marca', 'modelo', 'pantalla', 'procesador', 'ram', 'hdd', 'nserie', 'nserie2', 'entrega_id', 'estado_id', 'sistemaoperativo_id'];
}
