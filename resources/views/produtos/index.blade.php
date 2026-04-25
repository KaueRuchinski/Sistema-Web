@extends('layouts.master')

@section('title', 'Estoque')

@section('content')

<div style="display:flex; justify-content: space-between; align-items:center; margin-bottom:20px;">
    <h2>Estoque</h2>

    <a href="/" class="btn btn-secondary">
        ⬅ Voltar
    </a>
</div>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- FORM -->
<form method="POST" action="/produtos" style="margin-bottom:30px;">
    @csrf

    <div>
        <label>Nome do Produto:</label>
        <input type="text" name="nome" required>
    </div>

    <div>
        <label>Quantidade:</label>
        <input type="number" name="quantidade" required>
    </div>

    <div>
        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" required>
    </div>

    <button type="submit" class="btn btn-primary">
        Cadastrar Produto
    </button>
</form>

<hr>

<!-- LISTA -->
<h3>Produtos</h3>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Preço</th>
    </tr>

    @foreach($produtos as $p)
        <tr>
            <td>{{ $p->nome }}</td>
            <td>{{ $p->quantidade }}</td>
            <td>R$ {{ $p->preco }}</td>
        </tr>
    @endforeach

</table>

@endsection