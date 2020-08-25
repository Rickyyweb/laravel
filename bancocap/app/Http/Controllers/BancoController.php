<?php

namespace App\Http\Controllers;

use App\Banco;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bancos = Banco::all();

        return view('bancos.index', compact('bancos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bancos.create');
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
            'cnpj'=>'required',
            'nome'=>'required'
        ]);

        $banco = new Banco([
            'numero' => $request->get('numero'),
            'cnpj' => $request->get('cnpj'),
            'nome' => $request->get('nome')
        ]);
        $banco->save();
        return redirect('/bancos')->with('success', 'Banco gravado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function show(Banco $banco)
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
        $banco = Banco::find($id);
        return view('bancos.edit', compact('banco'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banco  $banco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'numero'=>'required',
            'cnpj'=>'required',
            'nome'=>'required'
        ]);

        $banco = Banco::find($id);
        $banco->numero = $request->get('numero');
        $banco->cnpj = $request->get('cnpj');
        $banco->nome = $request->get('nome');
        $banco->save();
        
        return redirect('/bancos')->with('success', 'Banco atualizado!');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banco = Banco::find($id);
        $banco->delete();

        return redirect('/bancos')->with('success', 'Banco removido!');
    }
}
