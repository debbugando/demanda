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
		<thead>
	    <tr>
	      <th>Nome</th>
	      <th>Valor</th>
	      <th>Descrição</th>
				<th>Quantidade</th>
				<th>Editar</th>
				<th>Remover</th>
	    </tr>
	  </thead>
	  <tbody>
			@foreach($produtos as $produto)
			<tr class="{{$produto->quantidade <=1 ? 'danger' : ''}}">
				<td>{{$produto->nome}}</td>
				<td>{{$produto->valor}}</td>
				<td>{{$produto->descricao}}</td>
				<td>{{$produto->quantidade}}</td>
				<td><a class="alteraProduto" href="{{action('ProdutoController@exibe', $produto->id) }}" title="Visualizar"><i class="fa fa-search" aria-hidden="true"></i></a></td>
				<td><a class="removeProduto" href="{{action('ProdutoController@remove', $produto->id )}}" title="Remover"><i class="fa fa-times" aria-hidden="true"></i></a></td>
			@endforeach
			</tr>
		</tbody>
	</table>
	</div>
	<div class="label label-danger pull-right h4">
	<strong>Sucesso!</strong>Um ou mais itens no Estoque</div>
	{{ $produtos->links() }}
	@endif
@stop
@section('custom_js')
<script src="{{ asset('js/custom.js') }}"></script>
@stop
