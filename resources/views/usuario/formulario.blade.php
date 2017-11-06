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
<h1>Novo Usuário</h1>
<form action="{{action('UserController@cadastra')}}" method="post">
<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
<div class="form-group">
<label>Nome</label>
<input name="name" class="form-control" value="{{ old('name') }}" />
</div>
<div class="form-group">
<label>E-mail</label>
<input name="email" class="form-control" value="{{ old('email') }}"/>
</div>
<div class="form-group">
<label>Senha</label>
<input type="password" name="password" class="form-control" value="{{ old('password') }}"/>
</div>
<div class="form-group">
<label>Confirmação Senha</label>
<input type="password" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}"/>
</div>
<div class="form-group">
<button type="submit"
class="btn btn-primary btn-block">Salvar</button>
</div>
</form>
@stop
