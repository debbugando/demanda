@extends('layouts.app')

@section('content')
  @if(empty($produto))
  <div class="alert alert-danger text-center">Produto não Encontrado</div>
  @else
  <h1>Produto {{$produto->nome}}</h1>
  <form action="{{action('ProdutoController@atualiza')}}" method="post">
  <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
  <input type="hidden" name="id" value="{{ $produto->id }}" />
  <div class="form-group">
  <label>Nome</label>
  <input name="nome" class="form-control" value="{{ $produto->nome }}" required />
  </div>
  <div class="form-group">
  <label>Descricao</label>
  <input name="descricao" class="form-control" value="{{ $produto->descricao }}" required/>
  </div>
  <div class="form-group">
  <label>Valor</label>
  <input name="valor" class="form-control" value="{{ $produto->valor }}" required/>
  </div>
  <div class="form-group">
  <label>Quantidade</label>
  <input type="number" name="quantidade" class="form-control" value="{{ $produto->quantidade }}"/>
  </div>
  <button type="submit"
  class="btn btn-primary btn-block">Editar</button>
  </form>
  @endif
@stop
