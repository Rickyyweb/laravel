@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Novo Estado</h1>
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
      <form method="post" action="{{ route('estados.store') }}">
          @csrf
        <div class="form-group">
            <label for="unidadefederacao">Nome da Unidade da Federação:</label>
            <input type="text" class="form-control" name="unidadefederacao"/>
        </div>

        <div class="form-group">    
            <label for="sigla">Sigla:</label>
            <input type="text" class="form-control" name="sigla"/>
        </div>

        <button type="submit" class="btn btn-primary-outline">Gravar</button>
      </form>
  </div>
</div>
</div>
@endsection