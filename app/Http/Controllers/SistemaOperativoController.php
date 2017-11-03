<?php

namespace App\Http\Controllers;

use App\SistemaOperativo;
use Illuminate\Http\Request;

class SistemaOperativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistop = SistemaOperativo::all();
        return view("sistemaoperativo.index", compact('sistop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistemaoperativo.create');
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
            'arquitectura' => 'required|integer'
        ]);

        $sistop = SistemaOperativo::create(request((['nombre', 'arquitectura'])));

        return redirect('/sistemaoperativo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SistemaOperativo  $sistemaOperativo
     * @return \Illuminate\Http\Response
     */
    public function show(SistemaOperativo $sistemaOperativo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SistemaOperativo  $sistemaOperativo
     * @return \Illuminate\Http\Response
     */
    public function edit(SistemaOperativo $sistemaOperativo)
    {
        return view('sistemaoperativo.edit',compact('sistemaOperativo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SistemaOperativo  $sistemaOperativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SistemaOperativo $sistemaOperativo)
    {
        $this->validate(request(), [
            'nombre' => 'required',
            'arquitectura' => 'required|integer'
        ]);

        $modificaciones = request((['nombre', 'arquitectura']));
        $sistemaOperativo->update($modificaciones);
        return redirect('/sistemaoperativo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SistemaOperativo  $sistemaOperativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SistemaOperativo $sistemaOperativo)
    {
        $sistemaOperativo->delete();
        return redirect('/sistemaoperativo');
    }
}
