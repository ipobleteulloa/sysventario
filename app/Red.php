<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Red extends Model
{
    protected $table = 'red';
    protected $fillable = ['codigo', 'mac', 'tipo'];
}
