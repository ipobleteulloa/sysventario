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
    public function notebook()
    {
        return $this->belongsTo('App\Notebook', 'codigo', 'codigo');
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
        //$codigo = $this->codigo;
        $cod = substr($this->codigo, 0, 3);
            switch ($cod) {
            case "CMP":
                return $this->equipo;
                break;
            case "NBK":
                return $this->notebook;
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
        $cod = substr($this->codigo, 0, 3);
        if ($cod == 'NBK')
            return $this->tipoObj()->marca. ' ' .$this->tipoObj()->modelo;
        else
            return $this->tipoObj()->nombre;
    }

    
    public function encargados()
    {
        if (count ($this->tipoObj()->sector->encargados()))
          return $this->tipoObj()->sector->encargados;
        else
          return NULL; 
    }

    public function urlMantenciones()
    {
        $codigo = $this->codigo;
        $cod = substr($codigo, 0, 3);
            switch ($cod) {
            case "CMP":
                return 'equipos/'. $codigo .'/mantenciones';
                break;
            case "NBK":
                return 'notebooks/'. $codigo .'/mantenciones';
                break;
            case "IMP":
                return 'impresoras/'. $codigo .'/mantenciones';
                break;
            case "OKI":
                return 'okidatas/'. $codigo .'/mantenciones';
                break;
            case "ZEB":
                return 'zebras/'. $codigo .'/mantenciones';
                break;
            }
    }

    public function urlObj()
    {
        $codigo = $this->codigo;
        $cod = substr($codigo, 0, 3);
            switch ($cod) {
            case "CMP":
                return 'equipos/'. $this->tipoObj()->id;
                break;
            case "NBK":
                return 'notebooks/'. $this->tipoObj()->id;
                break;
            case "IMP":
                return 'impresoras/'. $this->tipoObj()->id;
                break;
            case "OKI":
                return 'okidatas/'. $this->tipoObj()->id;
                break;
            case "ZEB":
                return 'zebras/'. $this->tipoObj()->id;
                break;
            }
    }



}

