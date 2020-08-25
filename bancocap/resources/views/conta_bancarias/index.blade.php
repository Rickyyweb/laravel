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
    <h1 class="display-3">Contas</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('conta_bancarias.create')}}" class="btn btn-primary">Nova conta</a>
    </div>      
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Titular</td>
          <td>Agência</td>
          <td>Conta</td>
          <td>Dígito</td>
          <td>Saldo</td>
        </tr>
    </thead>
    <tbody>
        @foreach($conta_bancarias as $conta_bancaria)
        <tr>
            <td>{{$conta_bancaria->id}}</td>
            <td>{{$conta_bancaria->user()->find($conta_bancaria->user_id)->name}}</td>
            <td>{{$conta_bancaria->agencia()->find($conta_bancaria->agencia_id)->numero}}</td>
            <td>{{$conta_bancaria->numero}}</td>
            <td>{{$conta_bancaria->digito}}</td>
            <td>{{$conta_bancaria->valor}}</td>
            
            <td>
                <a href="{{ route('conta_bancarias.edit',$conta_bancaria->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('conta_bancarias.destroy', $conta_bancaria->id)}}" method="post">
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