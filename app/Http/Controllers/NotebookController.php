<?php

namespace App\Http\Controllers;

use App\Notebook;
use App\SistemaOperativo;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notebooks = Notebook::all();
        return view('notebooks.index',compact($notebooks));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sisops = SistemaOperativo::all();
        return view('notebooks.create', compact($sisops));
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

            'marca' => 'required',
            'modelo' => 'required',
            'pantalla' => 'required',
            'procesador' => 'required',
            'ram' => 'required',
            'hdd' => 'required',
            'nserie' => 'required'
        ]);

        $notebook = Notebook::create($request->all());

        //$equipo =Equipo::create(request((['marca', 'modelo', 'pantalla', 'procesador', 'ram', 'hdd', 'nserie', 'ubicacion', 'sector_id', 'estado_id', 'sistemaoperativo_id'])));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Notebook $notebook)
    {
        //
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
        //
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
}
