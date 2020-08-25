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
    <h1 class="display-3">Bancos</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('bancos.create')}}" class="btn btn-primary">Novo banco</a>
    </div>      
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Numero</td>
          <td>CNPJ</td>
          <td>Nome</td>
        </tr>
    </thead>
    <tbody>
        @foreach($bancos as $banco)
        <tr>
            <td>{{$banco->id}}</td>
            <td>{{$banco->numero}}</td>
            <td>{{$banco->cnpj}}</td>
            <td>{{$banco->nome}}</td>
            <td>
                <a href="{{ route('bancos.edit',$banco->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('bancos.destroy', $banco->id)}}" method="post">
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