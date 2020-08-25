@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Informações de Agência</h1>

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
        <form method="post" action="{{ route('agencias.update', $agencia->id) }}">
            @method('PATCH') 
            @csrf
            
            <div class="form-group">
                    <label for="banco_id">Banco:</label>
                    <select name="banco_id" id="banco_id">
                      
                      @foreach($bancos as $banco)
                        <option value="{{$banco->id}}">{{ $banco->nome}}</option>
                      @endforeach
      
                    </select>
            </div>

            <div class="form-group">

                <label for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" value="{{ $agencia->numero }}" />
            </div>

            <div class="form-group">
                <label for="cnpj">Dígito:</label>
                <input type="text" class="form-control" name="digito" value="{{ $agencia->digito }}" />
            </div>

            <button type="submit" class="btn btn-primary">Atualizar?</button>
        </form>
    </div>
</div>
@endsection