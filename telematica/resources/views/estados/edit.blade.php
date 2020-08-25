@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Informações de Unidade da Federação</h1>

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
        <form method="post" action="{{ route('estados.update', $estado->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="unidadefederacao">Nome da Unidade da Federação:</label>
                <input type="text" class="form-control" name="unidadefederacao" value="{{ $estado->unidadefederacao}}"/>
            </div>
    
            <div class="form-group">    
                <label for="sigla">Sigla:</label>
            <input type="text" class="form-control" name="sigla" value="{{ $estado->sigla}}"/>
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar?</button>
        </form>
    </div>
</div>
@endsection