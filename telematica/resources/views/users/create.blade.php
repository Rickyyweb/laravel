@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Novo Usuário</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
        
      </div><br />
    @endif
      <form method="post" action="{{ route('users.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Nome:</label>
          <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
          </div>

          <div class="form-group">
              <label for="email">E-mail:</label>
              <input type="text" class="form-control" name="email" value="{{old('email')}}"/>
          </div>
          
          <div class="form-group">
              <label for="emailverificacao">E-mail:</label>
              <input type="text" class="form-control" name="email_verificacao" value="{{old('email_verificacao')}}"/>
          </div>

          <div class="form-group">
              <label for="password">Senha:</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          
          <div class="form-group">
              <label for="password">Confirmação Senha:</label>
              <input type="password" class="form-control" name="password_confirmacao"/>
          </div>

          <button type="submit" class="btn btn-primary-outline">Gravar</button>
      </form>
  </div>
</div>
</div>
@endsection