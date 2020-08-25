<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Telefone;
use App\User;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::id());
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $estados = Estado::all();

        return view('clientes.create', compact('users', 'estados'));
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
            'nome'=>'required',
            'cpf'=>'required',
            'dt_nascimento'=>'required',
            'local_nascimento'=>'required',
            'numero' =>  'required',
            'estado_id' =>  'required'
        ]);


        //
        //   Clientes de São Paulo devem informar o RG obrigatoriamente
        //
        $estado = Estado::find($request->get('estado_id'));
        $rg = $request->get('rg');
        if( empty($rg) && strtoupper($estado->sigla) == 'SP'){
            return redirect('/clientes/create')->withErrors(['message' => 'Clientes de São Paulo devem fornecer o RG!']);
        }

        // $dt_nascimento = DateTimeImmutable::createFromMutable($request('dt_nascimento'));
        $dt_nascimento = date_create($request->get('dt_nascimento'));

        $intervalo = $dt_nascimento->diff(new DateTime("now"));

        if( $intervalo->format('%Y') < 18 && strtoupper($estado->sigla) == 'BA') {
            return redirect('/clientes/create')->withErrors(['message' => 'Clientes da Bahia devem ter idade superior a 18 anos!']);
        }

        $telefone = array( 'numero' => $request->get('numero') );
        $cliente = new Cliente([
            'nome' => $request->get('nome'),
            'cpf' => $request->get('cpf'),
            'dt_nascimento' => $request->get('dt_nascimento'),
            'local_nascimento' => $request->get('local_nascimento'),
            'estado_id' => $request->get('estado_id'),
            'user_cad' => Auth::id(),
            'user_id' => $request->get('user_id')
        ]);
        $cliente->save();
        $cliente->telefones()->create($telefone);
        return redirect('/clientes')->with('success', 'Cliente gravado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
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
        $users = User::all();
        $cliente = Cliente::find($id);
        $estados = Estado::all();
        // $estado = $cliente->estado()->getQuery()->get(['id', 'unidadefederacao']);

        return view('clientes.edit', compact('cliente', 'users', 'estados'));   
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
            'user_id' => 'required', 
            'nome'=>'required',
            'cpf'=>'required',
            'dt_nascimento'=>'required',
            'local_nascimento'=>'required',
            'numero' =>  'required',
            'estado_id' =>  'required'
        ]);

        //
        //   Clientes de São Paulo devem informar o RG obrigatoriamente
        //
        $estado = Estado::find($request->get('estado_id'));
        $rg = $request->get('rg');
        if( empty($rg) && strtoupper($estado->sigla) == 'SP'){
            return redirect('/clientes/' .$id . '/edit')->withErrors(['message' => 'Clientes de São Paulo devem fornecer o RG!']);
        }

        // $dt_nascimento = DateTimeImmutable::createFromMutable($request('dt_nascimento'));
        $dt_nascimento = date_create($request->get('dt_nascimento'));

        $intervalo = $dt_nascimento->diff(new DateTime("now"));

        if( $intervalo->format('%Y') < 18 && strtoupper($estado->sigla) == 'BA') {
            return redirect('/clientes/' .$id . '/edit')->withErrors(['message' => 'Clientes da Bahia devem ter idade superior a 18 anos!']);
        }

        $telefone = array( 'numero' => $request->get('telefone') );
        
        $cliente = Cliente::find($id);
        $cliente->user_id = $request->get('user_id');
        $cliente->nome = $request->get('nome');
        $cliente->cpf = $request->get('cpf');
        $cliente->rg = $request->get('rg');
        $cliente->dt_nascimento = $request->get('dt_nascimento');
        $cliente->local_nascimento = $request->get('local_nascimento');
        $cliente->estado_id = $request->get('estado_id');
        $cliente->save();
        $cliente->telefones()->create($telefone);
        return redirect('/clientes')->with('success', 'Cliente gravado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect('/clientes')->with('success', 'Cliente removido!');
    }
}
