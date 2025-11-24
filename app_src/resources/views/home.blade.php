@extends('layouts.app')

@section('content')
<div style="
    display: flex;
    justify-content: center;
    align-items: center;
    height: 70vh;
">
    <div style="
        background: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        text-align: center;
        width: 420px;
    ">
        <h1 style="margin-bottom: 10px; font-size: 30px; font-weight: bold; color:#222;">
            Página Inicial
        </h1>

        <p style="margin-bottom: 25px; color:#555; font-size: 17px;">
            Bem-vindo
        </p>

        <a href="{{ route('categories.index') }}"
           style="
                background:#ff2d20;
                padding: 12px 25px;
                color:white;
                border-radius: 8px;
                text-decoration:none;
                font-size: 18px;
                transition: 0.2s;
                display: inline-block;
            "
           onmouseover="this.style.opacity='0.85'"
           onmouseout="this.style.opacity='1'"
        >
            Ir para Categorias
        </a>
    </div>
</div>
@endsection
