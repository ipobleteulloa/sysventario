<?php

namespace App\Http\Controllers;

use App\Equipo;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
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
        return view('equipos.create');
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

            'nombre' => 'required'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipo $equipo)
    {
        return view('equipos.edit', compact('equipo'));
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
        // $location = "activos";
        return view('equipos.index',compact('equipos'));
    }
    
    public function debaja()
    {
        $equipos = Equipo::debaja();
        // $location = "debaja";
        return view('equipos.index',compact('equipos'));
    }

    public function enrevision()
    {
        $equipos = Equipo::enrevision();
        // $location = "enrevision";
        return view('equipos.index',compact('equipos'));
    }
    
    public function contingencia()
    {
        $equipos = Equipo::contingencia();
        // $location = "contingencia";
        return view('equipos.index',compact('equipos'));
    }
}
