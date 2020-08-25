@extends('base')

@section('main')
<div class="row">
    <div class="col-sm-12">

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
      </div>    
<div class="col-sm-12">
    <h1 class="display-3">Clientes</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('clientes.create')}}" class="btn btn-primary">Novo cliente</a>
    </div>      
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>E-mail</td>
          <td>Nome</td>
          <td>Estado</td>
          <td>CPF</td>
          <td>Rg</td>
          <td>Data de Nascimento</td>
          <td>Local de Nascimento</td>
          <td>Data Cadastro</td>
          <td>Data Edição</td>
          <td>Quem Cadastrou?</td>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->user()->find($cliente->user_id)->email}}</td>
            <td>{{$cliente->nome}}</td>
            <td>{{$cliente->estado()->find($cliente->estado_id)->unidadefederacao}}</td>
            <td>{{$cliente->cpf}}</td>
            <td>{{$cliente->rg}}</td>
            <td>{{$cliente->dt_nascimento}}</td>
            <td>{{$cliente->local_nascimento}}</td>
            <td>{{$cliente->user_cad}}</td>
            <td>{{$cliente->user_last_edit}}</td>
            <td>{{$cliente->usercad()->find($cliente->user_cad)->email}}</td>
            <td>
                <a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection