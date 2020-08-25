<?php

namespace App\Http\Controllers;

use App\ContaBancaria;
use Illuminate\Http\Request;
use App\User;
use App\Agencia;
use App\Banco;

class ContaBancariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conta_bancarias = ContaBancaria::all();

        return view('conta_bancarias.index', compact('conta_bancarias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencias = Agencia::all();
        $users = User::all();
        $bancos = Banco::all();
        return view('conta_bancarias.create', compact('agencias', 'users', 'bancos'));

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
            'valor' => 'required',
            'user_id' => 'required',
            'agencia_id' => 'required',
            'banco_id'=>'required'
        ]);

        $contabancaria = new ContaBancaria([
            'numero' => $request->get('numero'),
            'digito' => $request->get('digito'),
            'valor' => $request->get('valor'),
            'banco_id' => $request->get('banco_id'),
            'agencia_id' => $request->get('agencia_id'),
            'user_id' => $request->get('user_id')
        ]);
        $contabancaria->save();
        
        return redirect('/conta_bancarias')->with('success', 'Conta gravada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContaBancaria  $ContaBancaria
     * @return \Illuminate\Http\Response
     */
    public function show(ContaBancaria $ContaBancaria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContaBancaria  $ContaBancaria
     * @return \Illuminate\Http\Response
     */
    public function edit(ContaBancaria $ContaBancaria)
    {
        $agencias = Agencia::all();
        $users = User::all();
        $bancos = Banco::all();
        return view('conta_bancarias.edit', compact('agencias', 'users', 'bancos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContaBancaria  $ContaBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero'=>'required',
            'digito'=>'required',
            'valor' => 'required',
            'user_id' => 'required',
            'agencia_id' => 'required',
            'banco_id'=>'required'
        ]);

        $contabancaria = ContaBancaria::find($id);

        $contabancaria->numero = $request->get('numero');
        $contabancaria->digito = $request->get('digito');
        $contabancaria->valor = $request->get('valor');
        $contabancaria->banco_id = $request->get('banco_id');
        $contabancaria->agencia_id = $request->get('agencia_id');
        $contabancaria->user_id = $request->get('user_id');

        $contabancaria->save();
        
        return redirect('/conta_bancarias')->with('success', 'Conta gravada!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContaBancaria  $ContaBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agencia = ContaBancaria::find($id);
        
       // $agencia->contabancarias()->find($agencia->conta_bancaria_id)

        $agencia->delete();

        return redirect('/conta_bancarias')->with('success', 'Conta removida!');
    }
}
