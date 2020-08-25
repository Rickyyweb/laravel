@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Nova Agência</h1>
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
      <form method="post" action="{{ route('agencias.store') }}">
          @csrf
          <div class="form-group">
              <label for="banco_id">Banco:</label>
              <select name="banco" id="banco">
                
                @foreach($bancos as $banco)
                  <option value="{{$banco->id}}">{{ $banco->nome}}</option>
                @endforeach

              </select>
              
          </div>
          
          <div class="form-group">    
              <label for="numero">Número da Agência:</label>
              <input type="text" class="form-control" name="numero"/>
          </div>

          <div class="form-group">
              <label for="digito">Dígito:</label>
              <input type="text" class="form-control" name="digito"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Gravar</button>
      </form>
  </div>
</div>
</div>
@endsection