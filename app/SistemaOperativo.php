<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SistemaOperativo extends Model
{
	protected $table = 'sistema_operativo';
    protected $fillable = ['nombre', 'arquitectura'];
}
