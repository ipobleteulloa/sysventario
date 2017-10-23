<?php

namespace App\Http\Controllers;

use App\Zebras;
use Illuminate\Http\Request;

class ZebrasController extends Controller
{
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
        return view('zebras.create');
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

            'nom_zebra' => 'required',
            'modelo' => 'required'
        ]);

        $zeb = Zebras::create(request((['nom_zebra', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id'])));
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
    public function show(Zebras $zebras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Zebras  $zebras
     * @return \Illuminate\Http\Response
     */
    public function edit(Zebras $zebra)
    {
        return view('zebras.edit',compact('zebra'));
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

                'nom_zebra' => 'required',
                'modelo' => 'required'
            ]);
        
            $modificaciones = request((['nom_zebra', 'modelo', 'ubicacion', 'tipo_conexion', 'estado_id']));
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
}
