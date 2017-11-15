<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;
/*use Carbon\Carbon;

Date::setLocale('es');
Carbon::setLocale('es');

$dt = Carbon::now();
setlocale(LC_TIME, 'Spanish');
echo $dt->formatLocalized('%A %d %B %Y');          // Mittwoch 21 Mai 1975
setlocale(LC_TIME, '');
echo $dt->formatLocalized('%A %d %B %Y');          // Wednesday 21 May 1975

die;*/
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

    public function nombreEquipo()
    {
        return $this->tipoObj()->nombre;
    }

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

    public function encargados()
    {
        return $this->tipoObj()->sector->encargados;
    }



}

