<?php

namespace App\Http\Controllers;

use App\Encargado;
use App\Sector;
use Illuminate\Http\Request;

class EncargadoController extends Controller
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
        // $encargados = Encargado::all();
        $encargados = Encargado::orderBy('nombre')->get();
        return view('encargados.index', compact('encargados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectores = Sector::all();
        return view('encargados.create', compact('sectores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->sector);

        $encargado = Encargado::create(request((['nombre', 'email'])));
        Encargado::find($encargado->id)->sectores()->attach($request->sector);
        return redirect('/encargados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function show(Encargado $encargado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function edit(Encargado $encargado)
    {
        $sectores = Sector::all();
        return view('encargados.edit', compact('encargado', 'sectores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Encargado $encargado)
    {
        $this->validate(request(), [

            'nombre' => 'required',
            'email' => 'required|email'
        ]);

        $modificaciones = request((['nombre', 'email']));
        $encargado->update($modificaciones);
        $encargado->sectores()->sync($request->sector);

        return redirect('/encargados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Encargado  $encargado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Encargado $encargado)
    {
        $encargado->delete();
        return redirect('/encargados');
    }
}
