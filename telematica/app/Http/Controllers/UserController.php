<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name'=>'required',
            'email'=>'required',
            'email_verificacao'=>'required',
            'password'=>'required',
            'password_confirmacao' => 'required'
        ]);

        $email = $request->get('email');
        $email_verificacao = $request->get('email_verificacao');


        if( $email != $email_verificacao){
            return redirect('/users/create')->withErrors(['message' => 'Confirmação de e-mail diferente!']);
        }

        $senha = $request->get('password');
        $senha_verificacao = $request->get('password_confirmacao');

        if( $senha != $senha_verificacao){
            return redirect('/users/create')->withErrors(['message' => 'Confirmação de senha diferente!']);
        }

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ]);
        $user->save();
        return redirect('/users/create')->with('success', 'Usuário gravado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'email_verificacao'=>'required'
        ]);

        
        $email = $request->get('email');
        $email_verificacao = $request->get('email_verificacao');
        
        if( $email != $email_verificacao){
            return redirect('/users/' . $id . '/edit')->withErrors(['message' => 'Confirmação de e-mail diferente!']);
        }
        
        $senha = $request->get('password');
        $senha_verificacao = $request->get('password_confirmacao');

        if( $senha != $senha_verificacao){
            return redirect('/users/' . $id . '/edit')->withErrors(['message' => 'Confirmação de senha diferente!']);
        }

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = empty($request->get('password')) ? $user->password : $request->get('password');
        $user->save();
        
        return redirect('/users')->with('success', 'Usuário atualizado!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
       // $agencia->contabancarias()->find($agencia->conta_bancaria_id)

        $user->delete();

        return redirect('/users')->with('success', 'Usuário removido!');
    }
}
