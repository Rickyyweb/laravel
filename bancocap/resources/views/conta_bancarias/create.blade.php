@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Nova conta</h1>
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
      <form method="post" action="{{ route('conta_bancarias.store') }}">
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
              <label for="agencia_id">Agência:</label>
              <select name="agencia_id" id="agencia_id">
                
                @foreach($agencias as $agencia)
                  <option value="{{$agencia->id}}">{{ $agencia->numero}}</option>
                @endforeach

              </select>
              
          </div>

          <div class="form-group">
              <label for="user_id">Titular:</label>
              <select name="user_id" id="user_id">
                
                @foreach($users as $user)
                  <option value="{{$user->id}}">{{ $user->name}}</option>
                @endforeach

              </select>
              
          </div>

          <div class="form-group">    
              <label for="numero">Número da Conta:</label>
              <input type="text" class="form-control" name="numero"/>
          </div>

          <div class="form-group">
              <label for="digito">Dígito:</label>
              <input type="text" class="form-control" name="digito"/>
          </div>

          <div class="form-group">
              <label for="valor">Saldo:</label>
              <input type="text" class="form-control" name="valor"/>
          </div>

          <button type="submit" class="btn btn-primary-outline">Gravar</button>
      </form>
  </div>
</div>
</div>
@endsection