@extends('layouts.app')
@section('content')
<h1>Listagem Usuário</h1>
{{-- Retorna a mensagem da rotina realizada --}}
<div class="flash-message">
  @if(Session::has('statusMsg'))
  <div class="alert alert-{{session('statusMsg')}}">{!! session('msg') !!}<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></div>
  @endif
</div> <!-- end .flash-message -->
	@if(empty($usuarios))
	<div class="alert alert-danger text-center">Sem Registros</div>
	@else
	<div class="table-responsive">
	<table class="table table-stripped table-bordered table-hover table-responsive">
		<thead>
      <tr>
        <th>Nome</th>
        <th>E-mail</th>
      </tr>
    </thead>
    <tbody>
		@foreach($usuarios as $usuario)
		<tr>
		<td>{{$usuario->name}}</td>
		<td>{{$usuario->email}}</td>
		@endforeach
		</tr>
	</tbody>
	</table>
	</div>
	{{ $usuarios->links() }}
	@endif
@stop
