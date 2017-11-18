<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
use App\Encargado;

class Mantencion extends Model
{
    protected $table = 'mantenciones';

    protected $fillable = ['codigo', 'detalle', 'created_at', 'updated_at'];

    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'codigo', 'codigo');
    }

    public function impresora()
    {
        return $this->belongsTo('App\Impresora', 'codigo', 'codigo');
    }

    public function okidata()
    {
        return $this->belongsTo('App\Okidata', 'codigo', 'codigo');
    }

    public function zebra()
    {
        return $this->belongsTo('App\Zebras', 'codigo', 'codigo');
    }

    /*public function nombre()
    {
        $codigo = $this->codigo;
        $cod = substr($codigo, 0, 3);
            switch ($cod) {
            case "CMP":
                return $this->equipo->nombre;
                break;
            case "IMP":
                return $this->impresora->nombre;
                break;
            case "OKI":
                return $this->okidata->nombre;
                break;
            case "ZEB":
                return $this->zebra->nombre;
                break;
            }
    }*/

    public function tipoObj()
    {
        $codigo = $this->codigo;
        $cod = substr($codigo, 0, 3);
            switch ($cod) {
            case "CMP":
                return $this->equipo;
                break;
            case "IMP":
                return $this->impresora;
                break;
            case "OKI":
                return $this->okidata;
                break;
            case "ZEB":
                return $this->zebra;
                break;
            }

    }

    public function nombreEquipo()
    {
        return $this->tipoObj()->nombre;
    }

    
    public function encargados()
    {
        if (count ($this->tipoObj()->sector->encargados()))
          return $this->tipoObj()->sector->encargados;
        else
          return NULL; 
    }



}

