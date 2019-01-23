<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Equipo;
use App\Impresora;
use App\Okidata;
use App\Usuario;
use App\Zebras;
use Response;
//use Input;

/*use App\Equipo;
use App\Impresora;
use App\Okidata;
use App\Zebras;*/

class SearchController extends Controller
{
    public function autocomplete(){
	
	//$equipos = Equipo::all()->toArray();
	$equipos = Equipo::where('estado_id', '!=', '2')->select('codigo', 'nombre')->get()->toArray();
	$impresoras = Impresora::where('estado_id', '!=', '2')->select('codigo', 'nombre')->get()->toArray();
	$okidatas = Okidata::where('estado_id', '!=', '2')->select('codigo', 'nombre')->get()->toArray();
	$zebras = Zebras::where('estado_id', '!=', '2')->select('codigo', 'nombre')->get()->toArray();

	return Response::json(array('equipos'=>$equipos,'impresoras'=>$impresoras,'okidatas'=>$okidatas, 'zebras'=>$zebras));
	}

	public function ___autocomplete()
	{
		$term = request('term');
        $result = Model::whereName($term)->orWhere('name', 'LIKE', '%' . $term . '%')->get(['id', 'name as value']);
        return response()->json($term);
	}

	public function usuarioAutocomplete(){
		/*$term = Input::get('term');
		
		$results = array();
		
		$queries = DB::table('usuarios')
			->where('nombre', 'LIKE', '%'.$term.'%')
			->orWhere('apellidos', 'LIKE', '%'.$term.'%')
			->take(5)->get();
		
		foreach ($queries as $query)
		{
		    $results[] = [ 'id' => $query->id, 'value' => $query->nombre.' '.$query->apellidos ];
		}
		return Response::json($results);*/

		//$usuarios = Usuario::all()->toArray();
		$usuarios = Usuario::select('id', 'nombre', 'apellidos', 'run')->get()->toArray();
		return Response::json($usuarios);

	}

}
