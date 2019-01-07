<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Entrega;
use App\Notebook;
use App\SistemaOperativo;
use Illuminate\Http\Request;

class NotebookController extends Controller
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
        $notebooks = Notebook::all();
        return view('notebooks.index',compact('notebooks'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$sectores = Sector::all()->sortBy('nombre');
        $so = SistemaOperativo::all()->sortBy('nombre');
        return view('notebooks.create', compact('so'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        $this->validate(request(), [

            'marca' => 'required',
            'modelo' => 'required',
            'pantalla' => 'required',
            'procesador' => 'required',
            'ram' => 'required',
            'hdd' => 'required',
            'nserie' => 'required',
            'mod_cargador' => 'required'
        ]);

        $notebook = Notebook::create($request->all());

        //$notebook = Notebook::create(request((['marca', 'modelo', 'pantalla', 'procesador', 'ram', 'hdd', 'nserie', 'ubicacion', 'sector_id', 'estado_id', 'sistemaoperativo_id'])));
        $lastnbkid = $notebook->id;
        if (strlen($lastnbkid) == 1) 
            $codigo = "NBK00".$lastnbkid;
        elseif (strlen($lastnbkid) == 2)
            $codigo = "NBK0".$lastnbkid;
        elseif (strlen($lastnbkid) == 3)
            $codigo = "NBK".$lastnbkid;

        $nbk = Notebook::find($lastnbkid);
        $nbk->codigo = $codigo;
        $nbk->save();

        return redirect('/notebooks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function show(Notebook $notebook)
    {
        return view('notebooks.show',compact('notebook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Notebook $notebook)
    {
        $sectores = Sector::all()->sortBy('nombre');
        $soperativos = SistemaOperativo::all()->sortBy('nombre');
        return view('notebooks.edit', compact('notebook', 'sectores', 'soperativos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notebook $notebook)
    {
        //Validaciones para el boton "Dar de baja"
        if($notebook['estado_id']!='2' && $request['dardebaja'] == 'dardebaja'){
            $notebook->estado_id = '2';
            $notebook->save();
        }
        else {
            $this->validate(request(), [
                'marca' => 'required',
                'modelo' => 'required',
                'pantalla' => 'required',
                'procesador' => 'required',
                'ram' => 'required',
                'hdd' => 'required',
                'nserie' => 'required',
                'mod_cargador' => 'required',
            ]);
        
            $modificaciones = request((['marca', 'modelo', 'pantalla', 'procesador', 'ram', 'hdd', 'nserie', 'mod_bateria', 'mod_cargador', 'observaciones', 'estado_id', 'sistemaoperativo_id']));
            $notebook->update($modificaciones);
        }
        return redirect('/notebooks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notebook $notebook)
    {
        //
    }

    public function activos()
    {
        $notebooks = Notebook::activos();
        return view('notebooks.index',compact('notebooks'));
    }
    
    public function debaja()
    {
        $notebooks = Notebook::debaja();
        return view('notebooks.index',compact('notebooks'));
    }

    public function enrevision()
    {
        $notebooks = Notebook::enrevision();
        return view('notebooks.index',compact('notebooks'));
    }
    
    public function contingencia()
    {
        $notebooks = Notebook::contingencia();
        return view('notebooks.index',compact('notebooks'));
    }

    public function mantencion(Notebook $notebook)
    {
        $info = $notebook;
        return view('mantenciones.create', compact('info'));
    }
}
