@extends('layouts.app')

@section('content')
<h1>Listagem Produtos</h1>
	{{-- Retorna a mensagem da rotina realizada --}}
	<div class="flash-message">
		@if(Session::has('statusMsg'))
    <div class="alert alert-{{session('statusMsg')}}">{!! session('msg') !!}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
		@endif
	</div> <!-- end .flash-message -->

	@if(empty($produtos))
	<div class="alert alert-danger text-center">Sem Registros</div>
	@else
	<div class="table-responsive">
	<table class="table table-stripped table-bordered table-hover table-responsive">
		@foreach($produtos as $produto)
		<tr class="{{$produto->quantidade <=1 ? 'danger' : ''}}">
		<td>{{$produto->nome}}</td>
		<td>{{$produto->valor}}</td>
		<td>{{$produto->descricao}}</td>
		<td>{{$produto->quantidade}}</td>
		<td><a href="{{action('ProdutoController@exibe', $produto->id) }}" title="Visualizar"><i class="fa fa-search" aria-hidden="true"></i></a></td>
		<td><a href="{{action('ProdutoController@remove', $produto->id )}}" title="Remover"><i class="fa fa-times" aria-hidden="true"></i></a></td>
		@endforeach
		</tr>
	</table>
	</div>
	<div class="label label-danger pull-right h4">
	<strong>Sucesso!</strong>Um ou mais itens no Estoque</div>
	@endif
@stop
