@extends('layouts.master')

@section('title', 'Home')

@section('content')

<h1 style="text-align:center; margin-bottom: 30px;">
    Sistema da Loja
</h1>

<div style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">

    <a href="/atendimentos" class="btn btn-success btn-lg">
        💰 Atendimentos
    </a>

    <a href="/gastos" class="btn btn-danger btn-lg">
        💸 Gastos
    </a>

    <a href="/produtos" class="btn btn-primary btn-lg">
        📦 Estoque
    </a>

    <a href="/dashboard" class="btn btn-dark btn-lg">
        🔐 Área do Admin
    </a>

</div>

@endsection