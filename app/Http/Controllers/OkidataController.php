<?php

namespace App\Http\Controllers;

use App\Okidata;
use App\Sector;
use Illuminate\Http\Request;

class OkidataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy', 'mantencion']]);

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $okidatas = Okidata::all();
        return view("okidatas.index", compact('okidatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all()->sortBy('nombre');
        return view('okidatas.create', compact('sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [

            'nombre' => 'required',
            'modelo' => 'required',
            'sector_id' => 'required'
        ]);

        $oki = Okidata::create(request((['nombre', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id', 'sector_id'])));
        $lastokiid = $oki->id;
        if (strlen($lastokiid) == 1) 
            $codigo = "OKI00".$lastokiid;
        elseif (strlen($lastokiid) == 2)
            $codigo = "OKI0".$lastokiid;
        elseif (strlen($lastokiid) == 3)
            $codigo = "OKI".$lastokiid;

        $okidata = Okidata::find($oki->id);
        $okidata->codigo = $codigo;
        $okidata->save();

        return redirect('/okidatas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Okidata  $okidata
     * @return \Illuminate\Http\Response
     */
    public function show(Okidata $okidata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Okidata  $okidata
     * @return \Illuminate\Http\Response
     */
    public function edit(Okidata $okidata)
    {
        $sectores = Sector::all()->sortBy('nombre');
        return view('okidatas.edit', compact('okidata', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Okidata  $okidata
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Okidata $okidata)
    {
        //Validaciones para el boton "Dar de baja"
        if($okidata['estado_id']!='2' && $request['dardebaja'] == 'dardebaja'){
            $okidata->estado_id = '2';
            $okidata->save();
        }
        else {

            $this->validate(request(), [

                'nombre' => 'required',
                'modelo' => 'required',
                'sector_id' => 'required'
            ]);
        
            $modificaciones = request((['nombre', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id', 'poseeusb', 'sector_id']));
            $okidata->update($modificaciones);
        }
        return redirect('/okidatas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Okidata  $okidata
     * @return \Illuminate\Http\Response
     */
    public function destroy(Okidata $okidata)
    {
        //
    }

    public function activas()
    {
        $okidatas = Okidata::activas();
        return view('okidatas.index',compact('okidatas'));
    }
    
    public function debaja()
    {
        $okidatas = Okidata::debaja();
        return view('okidatas.index',compact('okidatas'));
    }

    public function enrevision()
    {
        $okidatas = Okidata::enrevision();
        return view('okidatas.index',compact('okidatas'));
    }
    
    public function contingencia()
    {
        $okidatas = Okidata::contingencia();
        return view('okidatas.index',compact('okidatas'));
    }

    public function mantencion(Okidata $okidata)
    {
        $info = $okidata;
        return view('mantenciones.create', compact('info'));
    }
}
