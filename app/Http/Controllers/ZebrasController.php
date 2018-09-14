<?php

namespace App\Http\Controllers;

use App\Zebras;
use App\Sector;
use Illuminate\Http\Request;

class ZebrasController extends Controller
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
        $zebras = Zebras::all();
        $location = "index";
        return view("zebras.index", compact('zebras', 'location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all()->sortBy('nombre');
        return view('zebras.create', compact('sectores'));
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

        $zeb = Zebras::create(request((['nombre', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id', 'sector_id', 'sector_id'])));
        $lastzebid = $zeb->id;
        if (strlen($lastzebid) == 1) 
            $codigo = "ZEB00".$lastzebid;
        elseif (strlen($lastzebid) == 2)
            $codigo = "ZEB0".$lastzebid;
        elseif (strlen($lastzebid) == 3)
            $codigo = "ZEB".$lastzebid;

        $zebra = Zebras::find($zeb->id);
        $zebra->codigo = $codigo;
        $zebra->save();

        return redirect('/zebras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Zebras  $zebras
     * @return \Illuminate\Http\Response
     */
    public function show(Zebras $zebra)
    {
        // dd($zebra);
        return view('zebras.show', compact('zebra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zebras  $zebras
     * @return \Illuminate\Http\Response
     */
    public function edit(Zebras $zebra)
    {
        $sectores = Sector::all()->sortBy('nombre');
        return view('zebras.edit',compact('zebra', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Zebras  $zebras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zebras $zebra)
    {
        //Validaciones para el boton "Dar de baja"
        if($zebra['estado_id']!='2' && $request['dardebaja'] == 'dardebaja'){
            $zebra->estado_id = '2';
            $zebra->save();
        }
        else {

            $this->validate(request(), [

                'nombre' => 'required',
                'modelo' => 'required',
                'sector_id' => 'required'
            ]);
        
            $modificaciones = request((['nombre', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id', 'sector_id']));
            $zebra->update($modificaciones);
        }
        return redirect('/zebras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Zebras  $zebras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zebras $zebras)
    {
        //
    }

    public function activas()
    {
        $zebras = Zebras::activas();
        $location = "activas";
        return view('zebras.index',compact('zebras','location'));
    }
    
    public function debaja()
    {
        $zebras = Zebras::debaja();
        $location = "debaja";
        return view('zebras.index',compact('zebras','location'));
    }

    public function enrevision()
    {
        $zebras = Zebras::enrevision();
        return view('zebras.index',compact('zebras'));
    }
    
    public function contingencia()
    {
        $zebras = Zebras::contingencia();
        return view('zebras.index',compact('zebras'));
    }

    public function mantencion(Zebras $zebra)
    {
        $info = $zebra;
        return view('mantenciones.create', compact('info'));
    }
}
