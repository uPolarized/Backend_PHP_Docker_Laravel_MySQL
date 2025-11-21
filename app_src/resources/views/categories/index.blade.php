@extends('layouts.app')

@section('title','Categorias')

@section('content')
<h1>Categorias</h1>
@if(session('success'))
<p style="color:green;">{{ session('success') }}</p>
@endif
<a href="{{ route('categories.create') }}">Criar nova categoria</a>
<table border="1" cellpadding="8" cellspacing="0" style="margin-top:15px;width:100%;">
<thead>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Descrição</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
@forelse($categories as $cat)
<tr>
<td>{{ $cat->id }}</td>
<td>{{ $cat->nome }}</td>
<td>{{ $cat->descricao }}</td>
<td>
<a href="{{ route('categories.edit',$cat) }}">Editar</a>
<form method="POST" action="{{ route('categories.destroy',$cat) }}" style="display:inline;">
@csrf
@method('DELETE')
<button onclick="return confirm('Excluir?')">Excluir</button>
</form>
</td>
</tr>
@empty
<tr><td colspan="4" style="text-align:center;">Nenhuma categoria.</td></tr>
@endforelse
</tbody>
</table>
<div style="margin-top:12px;">{{ $categories->links() }}</div>
@endsection
