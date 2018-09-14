<?php

namespace App\Http\Controllers;

use App\Equipo;
use App\Sector;
use App\SistemaOperativo;
use Illuminate\Http\Request;

class EquipoController extends Controller
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
        $equipos = Equipo::all();
        $location = "index";
        return view("equipos.index", compact('equipos','location')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all()->sortBy('nombre');
        $so = SistemaOperativo::all();
        return view('equipos.create', compact('sectores', 'so'));
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
            'sector_id' => 'required'
        ]);

        $equipo =Equipo::create(request((['nombre', 'procesador', 'ram', 'hdd', 'placa_madre', 'ubicacion', 'sector_id', 'estado_id', 'sistemaoperativo_id'])));
        $lastequipoid = $equipo->id;
        if (strlen($lastequipoid) == 1) 
            $codigo = "CMP00".$lastequipoid;
        elseif (strlen($lastequipoid) == 2)
            $codigo = "CMP0".$lastequipoid;
        elseif (strlen($lastequipoid) == 3)
            $codigo = "CMP".$lastequipoid;

        $cmp = Equipo::find($equipo->id);
        $cmp->codigo = $codigo;
        $cmp->save();

        return redirect('/equipos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        // dd($equipo);
        return view('equipos.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        $sectores = Sector::all()->sortBy('nombre');
        $soperativos = SistemaOperativo::all()->sortBy('nombre');
        return view('equipos.edit', compact('equipo', 'sectores', 'soperativos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        //Validaciones para el boton "Dar de baja"
        if($equipo['estado_id']!='2' && $request['dardebaja'] == 'dardebaja'){
            $equipo->estado_id = '2';
            $equipo->save();
        }
        else {
            //dd($request);
            $this->validate(request(), [
                'nombre' => 'required'
            ]);
        
            $modificaciones = request((['nombre', 'procesador', 'ram', 'hdd', 'placa_madre', 'ubicacion', 'sector_id', 'estado_id', 'sistemaoperativo_id']));
            $equipo->update($modificaciones);
        }
        return redirect('/equipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipo $equipo)
    {
        //
    }

    public function activos()
    {
        $equipos = Equipo::activos();
        return view('equipos.index',compact('equipos'));
    }
    
    public function debaja()
    {
        $equipos = Equipo::debaja();
        return view('equipos.index',compact('equipos'));
    }

    public function enrevision()
    {
        $equipos = Equipo::enrevision();
        return view('equipos.index',compact('equipos'));
    }
    
    public function contingencia()
    {
        $equipos = Equipo::contingencia();
        return view('equipos.index',compact('equipos'));
    }

    public function mantencion(Equipo $equipo)
    {
        $info = $equipo;
        return view('mantenciones.create', compact('info'));
    }
}
