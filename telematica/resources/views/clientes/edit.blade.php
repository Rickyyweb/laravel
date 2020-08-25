@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Informações de user</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('clientes.update', $cliente->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="user_id">Usuarios:</label>
                <select name="user_id" id="user_id">
                  
                  @foreach($users as $user)
                    <option value="{{$user->id}}">{{ $user->name}}</option>
                  @endforeach
  
                </select>
            </div>
            <div class="form-group">
                <label for="estado_id">Estado:</label>
                <select name="estado_id" id="estado_id">
                  
                  @foreach($estados as $estado)
                    
                    <option value="{{$estado->id}}" {{$cliente->estado()->find($cliente->estado_id)->unidadefederacao == $estado->unidadefederacao ? 'selected': '' }}>
                        {{ $estado->unidadefederacao}}
                    </option>
                  @endforeach
    
                </select>
            </div>



            
            <div class="form-group">
                <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" value="{{ $cliente->nome}}"/>
            </div>
    
            <div class="form-group">    
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" name="cpf" value="{{ $cliente->cpf}}"/>
            </div>
    
            <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" name="rg" value="{{ $cliente->rg}}"/>
            </div>
    
            <div class="form-group">
                <label for="dt_nascimento">Data de nascimento:</label>
                <input type="text" class="form-control" name="dt_nascimento" value="{{ $cliente->dt_nascimento}}"/>
            </div>
    
            <div class="form-group">
                <label for="local_nascimento">Local nascimento:</label>
                <input type="text" class="form-control" name="local_nascimento" value="{{$cliente->local_nascimento}}"/>
            </div>
    
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="text" class="form-control" name="numero" value="{{$cliente->telefones()->first()->numero}}"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar?</button>
        </form>
    </div>
</div>
@endsection