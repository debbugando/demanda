@extends('layouts.app')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif
<h1>Novo produto</h1>
<form action="{{action('ProdutoController@cadastra')}}" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <input type="hidden" name="usuario_criou" value="{{ Auth::user()->id }}" />
    <div class="form-group">
        <label>Nome</label>
        <input name="nome" class="form-control" value="{{ old('nome') }}" />
    </div>
    <div class="form-group">
        <label>Descricao</label>
        <input name="descricao" class="form-control" value="{{ old('descricao') }}" />
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input name="valor" class="form-control" value="{{ old('valor') }}" />
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade') }}" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Salvar</button>
    </div>
</form>
@stop
