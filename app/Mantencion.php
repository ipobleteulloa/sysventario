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


    public function equipo()
    {
        return $this->belongsTo('App\Equipo', 'codigo', 'codigo');
    }

}
