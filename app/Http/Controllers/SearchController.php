<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;

/*use App\Equipo;
use App\Impresora;
use App\Okidata;
use App\Zebras;*/

class SearchController extends Controller
{
    public function autocomplete(){
	//$term = Input::get('term');
	
	$results = array();
	
	$equipos = DB::table('equipos')
			->select('codigo', 'nombre');

	$impresoras = DB::table('impresoras')
            ->select('codigo', 'nombre');
            // ->union($equipos);
            
    $okidatas = DB::table('okidatas')
            ->select('codigo', 'nombre');
            // ->union($impresoras);

	$queries = DB::table('zebras')
	        ->select('codigo', 'nombre')
	        ->union($equipos)
	        ->union($impresoras)
	        ->union($okidatas)
            ->get();
	
	foreach ($queries as $query)
	{
	    $results[] = [ 'codigo' => $query->codigo, 'nombre' => $query->nombre ];
	}

	return Response::json($results);

	}
}
