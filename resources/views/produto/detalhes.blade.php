@extends('layouts.app')

@section('content')
  @if(empty($produto))
  <div class="alert alert-danger text-center">Produto não Encontrado</div>
  @else
  @if (count($errors) > 0)
  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </ul>
  </div>
  @endif
  <h1>Detalhes Produto {{$produto->nome}}</h1>
  <form action="{{action('ProdutoController@atualiza')}}" method="post">
      <input type="hidden" name="_method" value="PUT">
      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
      <input class="hidden" name="id" value="{{ $produto->id }}" />
      <div class="form-group">
          <label>Nome</label>
          <input type="text" name="nome" class="form-control" value="{{ old('nome', $produto->nome) }}" />
      </div>
      <div class="form-group">
          <label>Descricao</label>
          <input type="text" name="descricao" class="form-control" value="{{ old('descricao',$produto->descricao) }}" />
      </div>
      <div class="form-group">
          <label>Valor</label>
          <input type="number" step="any" name="valor" class="form-control" value="{{ old('valor', $produto->valor) }}" />
      </div>
      <div class="form-group">
          <label>Quantidade</label>
          <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade', $produto->quantidade) }}" />
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Editar</button>
      </div>
  </form>
  @endif
@stop
