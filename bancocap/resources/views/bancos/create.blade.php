@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Novo Banco</h1>
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
      <form method="post" action="{{ route('bancos.store') }}">
          @csrf
          <div class="form-group">    
              <label for="numero">Número da Conta:</label>
              <input type="text" class="form-control" name="numero"/>
          </div>

          <div class="form-group">
              <label for="cnpj">CNPJ:</label>
              <input type="text" class="form-control" name="cnpj"/>
          </div>

          <div class="form-group">
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Gravar</button>
      </form>
  </div>
</div>
</div>
@endsection