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
    <h1 class="display-3">Agências</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('agencias.create')}}" class="btn btn-primary">Nova Agência</a>
    </div>      
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Banco</td>
          <td>Conta</td>
          <td>Dígito</td>
        </tr>
    </thead>
    <tbody>
        @foreach($agencias as $agencia)
        <tr>
            <td>{{$agencia->id}}</td>
            <td>{{$agencia->banco()->find($agencia->banco_id)->nome}}</td>
            <td>{{$agencia->numero}}</td>
            <td>{{$agencia->digito}}</td>
            <td>
                <a href="{{ route('agencias.edit',$agencia->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('agencias.destroy', $agencia->id)}}" method="post">
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