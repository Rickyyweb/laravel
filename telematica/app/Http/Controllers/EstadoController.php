<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Estado;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::all();

        return view('estados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();

        return view('estados.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unidadefederacao'=>'required',
            'sigla'=>'required'
        ]);


        $estado = new Estado([
            'unidadefederacao' => $request->get('unidadefederacao'),
            'sigla' => $request->get('sigla')
        ]);
        $estado->save();
        return redirect('/estados')->with('success', 'Estado gravado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estado = Estado::find($id);

        return view('estados.edit', compact('estado'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'unidadefederacao'=>'required',
            'sigla'=>'required'
        ]);

        $estado = Estado::find($id);
        $estado->unidadefederacao = $request->get('unidadefederacao');
        $estado->sigla = $request->get('sigla');
        $estado->save();
        return redirect('/estados')->with('success', 'Estado gravado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = Estado::find($id);
        $estado->delete();

        return redirect('/estados')->with('success', 'Estado removido!');
    }

}
