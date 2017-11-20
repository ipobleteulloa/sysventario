<?php

namespace App\Http\Controllers;

use App\Impresora;
use App\Sector;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class ImpresorasController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'mantencion']]);

    }
    
    public function index()
	{
		$impresoras = Impresora::all();
		$location = "index";
		return view('impresoras.index',compact('impresoras','location'));
	}
	
	public function show(Impresora $codigo)
	{
		//$impresora = DB::table('impresoras')->where('codigo', $codigo )->first();
		
		return $codigo;
		//$impresora = Impresora::mostrar($codigo);
		//return view('impresoras.show',compact('impresora'));
	}
	
	public function activas()
	{
		$impresoras = Impresora::activas();
		return view('impresoras.index',compact('impresoras'));
	}
	
	public function debaja()
	{
		$impresoras = Impresora::debaja();
		return view('impresoras.index',compact('impresoras'));
	}

	public function enrevision()
    {
        $impresoras = Impresora::enrevision();
        return view('impresoras.index',compact('impresoras'));
    }
    
    public function contingencia()
    {
        $impresoras = Impresora::contingencia();
        return view('impresoras.index',compact('impresoras'));
    }

	public function create()
	{
		$sectores = Sector::all()->sortBy('nombre');
		return view('impresoras.create', compact('sectores'));
	}
		
	public function store()
	{
		/*$imp = new \App\Impresora;
		$imp->nombre = request(nombre);
		$imp->marca = request(marca);
		$imp->modelo = request(modelo);
		$imp->insumos = request(insumos);
		$imp->ubicacion = request(ubicacion);
		$imp->estado_id = request(radio);
		$imp->save();*/

		$this->validate(request(), [

			'nombre' => 'required',
			'marca' => 'required',
			'modelo' => 'required',
			'sector_id' => 'required'
		]);

		$imp = Impresora::create(request((['nombre', 'marca', 'modelo', 'insumos', 'ubicacion', 'tipo_conexion', 'estado_id', 'sector_id'])));
		$lastimpid = $imp->id;
		if (strlen($lastimpid) == 1) 
			$codigo = "IMP00".$lastimpid;	
		elseif (strlen($lastimpid) == 2)
			$codigo = "IMP0".$lastimpid;
		elseif (strlen($lastimpid) == 3)
			$codigo = "IMP".$lastimpid;
		


		/*Requiere use Illuminate\Support\Facades\DB;
		DB::table('impresoras')
            ->where('id', $lastimpid)
            ->update(['codigo' => $codigo]);*/

        //Reemplaza a las lineas comentadas anteriores
        $impres = Impresora::find($imp->id);
        $impres->codigo = $codigo;
        $impres->save();    

		return redirect('/impresoras');
	}


	 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Impresora  $impresora
     * @return \Illuminate\Http\Response
     */
    public function edit(Impresora $impresora) // edit(Impresora $impresora)
    {
    	$sectores = Sector::all()->sortBy('nombre');
        return view('impresoras.edit',compact('impresora', 'sectores'));
    }
	

	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Impresora $impresora
     * @return \Illuminate\Http\Response
     */
	public function update(Request $request, Impresora $impresora)
    {
    	//Validaciones para el boton "Dar de baja"
    	if($impresora['estado_id']!='2' && $request['dardebaja'] == 'dardebaja'){
    		$impresora->estado_id = '2';
    		$impresora->save();
       	}
       	else {

	       	$this->validate(request(), [

				'nombre' => 'required',
				'marca' => 'required',
				'modelo' => 'required',
				'sector_id' => 'required'
			]);
		
			$modificaciones = request((['nombre', 'marca', 'modelo', 'insumos', 'ubicacion', 'tipo_conexion', 'estado_id', 'sector_id']));
			$impresora->update($modificaciones);
		}
    	return redirect('/impresoras');
    }


	public function destroy($id)
    {
    	// Para eliminar utilizar el siguiente código en blade
    	/*
	    	<form action="{{ url('impresoras/'. $impresora->id) }}" method="POST" onsubmit="return confirm('¿Confirmar eliminaci&oacute;n?')">
	            {{ method_field('delete') }}
	            {{ csrf_field() }}
	            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
	        </form>
		*/
    	$impresora = Impresora::find($id);
    	$impresora->delete();
    	return redirect('/impresoras');
    }

    public function mantencion(Impresora $impresora)
    {
        $info = $impresora;
        return view('mantenciones.create', compact('info'));
    }
	
}
