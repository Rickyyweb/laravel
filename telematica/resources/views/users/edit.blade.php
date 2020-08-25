@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Atualizar Informações de Usuário</h1>

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
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
            </div>

            <div class="form-group">
                <label for="cnpj">E-mail:</label>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
            </div>

            <div class="form-group">
                <label for="emailverificacao">Confirmação de E-mail:</label>
                <input type="text" class="form-control" name="email_verificacao" value="{{ $user->email }}" />
            </div>

            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" value="{{ $user->password }}" />
            </div>

            <div class="form-group">
                    <label for="password">Confirmação Senha:</label>
                    <input type="password" class="form-control" name="password_confirmacao" value="{{ $user->password }}" />
            </div>            

            <button type="submit" class="btn btn-primary">Atualizar?</button>
        </form>
    </div>
</div>
@endsection