@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Informações de Banco</h1>

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
        <form method="post" action="{{ route('bancos.update', $banco->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="numero">Número:</label>
                <input type="text" class="form-control" name="numero" value="{{ $banco->numero }}" />
            </div>

            <div class="form-group">
                <label for="cnpj">CNPJ:</label>
                <input type="text" class="form-control" name="cnpj" value="{{ $banco->cnpj }}" />
            </div>

            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $banco->nome }}" />
            </div>
            
            <button type="submit" class="btn btn-primary">Atualizar?</button>
        </form>
    </div>
</div>
@endsection