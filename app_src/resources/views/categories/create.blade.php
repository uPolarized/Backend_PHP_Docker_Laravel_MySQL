@extends('layouts.app')

@section('title','Criar Categoria')

@section('content')
<h1>Criar Categoria</h1>
@if($errors->any())
<div style="color:red;">
<ul>
@foreach($errors->all() as $e)
<li>{{ $e }}</li>
@endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ route('categories.store') }}">
@csrf
<div>
<label>Nome</label><br>
<input type="text" name="nome" value="{{ old('nome') }}" required>
</div>
<div style="margin-top:8px;">
<label>Descrição</label><br>
<textarea name="descricao">{{ old('descricao') }}</textarea>
</div>
<div style="margin-top:8px;">
<button type="submit">Salvar</button>
<a href="{{ route('categories.index') }}" style="margin-left:8px;">Cancelar</a>
</div>
</form>
@endsection
