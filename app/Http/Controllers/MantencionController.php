<?php

namespace App\Http\Controllers;

use App\Mantencion;
use Illuminate\Http\Request;
use App\Mail\MantencionCaja;
use App\Mail\MantencionOkiCaja;
// use Carbon\Carbon;

class MantencionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['create', 'store', 'edit', 'update', 'destroy']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenciones = Mantencion::all()->sortByDesc("created_at");
        // dd($mantenciones);
        // $mantenciones = Mantencion::orderBy('created_at')->get();

        //return view('mantenciones.index', compact('mantenciones'));
        return view('mantenciones.index')->with('mantenciones',$mantenciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('mantenciones.create');
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

            'detalle' => 'required'
        ]);

        $mantencion = Mantencion::create(request((['codigo', 'detalle'])));

        
        //Aquí se hacen las maniobras para enviar un email a la supervisora de cajas
        //cada vez que se le realice una mantencion a un pc u okidata del sector cajas
        /*$codigo = substr($mantencion->codigo, 0, 3);
        
        switch ($codigo) {
        case "CMP":
            if($mantencion->equipo->sector->nombre == "Cajas")
                \Mail::to('strivino@sanchezysanchez.cl')->send(new MantencionCaja($mantencion));
            break;
        case "OKI":
            if($mantencion->okidata->sector->nombre == "Cajas")
                \Mail::to('strivino@sanchezysanchez.cl')->send(new MantencionOkiCaja($mantencion));
            break;
        } */

        


        return redirect('/mantenciones');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function show(Mantencion $mantencion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantencion $mantencion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantencion $mantencion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mantencion  $mantencion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantencion $mantencion)
    {
        //
    }

    public function buscar()
    {
        return view('mantenciones.buscar');
    }
}
