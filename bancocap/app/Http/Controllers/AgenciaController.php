<?php

namespace App\Http\Controllers;

use App\Agencia;
use Illuminate\Http\Request;
use App\Banco;

class AgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencias = Agencia::all();

        return view('agencias.index', compact('agencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bancos = Banco::all();
        return view('agencias.create', compact('bancos'));
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
            'numero'=>'required',
            'digito'=>'required',
            'banco_id'=>'required'
        ]);

        $banco = new Agencia([
            'numero' => $request->get('numero'),
            'digito' => $request->get('digito'),
            'banco_id' => $request->get('banco_id')
        ]);
        $banco->save();
        return redirect('/agencias')->with('success', 'Agência gravada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function show(Agencia $agencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agencia = Agencia::find($id);

        $bancos = Banco::all();
        return view('agencias.edit', compact('agencia', 'bancos'));        
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero'=>'required',
            'digito'=>'required',
            'banco_id'=>'required'
        ]);

        $agencia = Agencia::find($id);
        $agencia->numero = $request->get('numero');
        $agencia->digito = $request->get('digito');
        $agencia->banco_id = $request->get('banco_id');
        $agencia->save();
        
        return redirect('/agencias')->with('success', 'Agência atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agencia = Agencia::find($id);
        
       // $agencia->contabancarias()->find($agencia->conta_bancaria_id)

        $agencia->delete();

        return redirect('/agencias')->with('success', 'Agência removido!');
    }
}
