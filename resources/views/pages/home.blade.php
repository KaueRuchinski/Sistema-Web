@extends('layouts.master')

@section('title', 'Home')

@section('content')

<h1 style="text-align:center; margin-bottom: 30px;">
    Sistema da Loja
</h1>

<div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
    <div style="display:flex; justify-content: space-between; align-items:center; margin-bottom:20px;">

    <div>
        <strong>Bem-vindo, {{ auth()->user()->name }}</strong>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-secondary">
            🚪 Sair
        </button>
    </form>

</div>

<a href="/atendimentos" class="btn btn-success btn-lg">
        💰 Atendimentos
    </a>

    <a href="/gastos" class="btn btn-danger btn-lg">
        💸 Gastos
    </a>

    <a href="/produtos" class="btn btn-primary btn-lg">
        📦 Estoque
    </a>

    @auth
        @if(auth()->user()->tipo === 'admin')
            <a href="/dashboard" class="btn btn-dark btn-lg">
                🔒 Área do Admin
            </a>
        @endif
    @endauth

@endsection