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
    <h1 class="display-3">estados</h1>
    <div>
        <a style="margin: 19px;" href="{{ route('estados.create')}}" class="btn btn-primary">Novo estado</a>
    </div>      
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Unidade da Federação</td>
          <td>Sigla</td>
        </tr>
    </thead>
    <tbody>
        @foreach($estados as $estado)
        <tr>
            <td>{{$estado->id}}</td>
            <td>{{$estado->unidadefederacao}}</td>
            <td>{{$estado->sigla}}</td>
            <td>
                <a href="{{ route('estados.edit',$estado->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('estados.destroy', $estado->id)}}" method="post">
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