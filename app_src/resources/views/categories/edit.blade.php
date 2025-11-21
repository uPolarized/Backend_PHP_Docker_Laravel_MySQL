@extends('layouts.app')

@section('title','Editar Categoria')

@section('content')
<h1>Editar Categoria</h1>
@if($errors->any())
<div style="color:red;">
<ul>
@foreach($errors->all() as $e)
<li>{{ $e }}</li>
@endforeach
</ul>
</div>
@endif
<form method="POST" action="{{ route('categories.update',$category) }}">
@csrf
@method('PUT')
<div>
<label>Nome</label><br>
<input type="text" name="nome" value="{{ old('nome',$category->nome) }}" required>
</div>
<div style="margin-top:8px;">
<label>Descrição</label><br>
<textarea name="descricao">{{ old('descricao',$category->descricao) }}</textarea>
</div>
<div style="margin-top:8px;">
<button type="submit">Atualizar</button>
<a href="{{ route('categories.index') }}" style="margin-left:8px;">Cancelar</a>
</div>
</form>
@endsection
