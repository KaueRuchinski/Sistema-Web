@extends('layouts.master')

@section('title', 'Gastos')

@section('content')

<div style="display:flex; justify-content: space-between; align-items:center; margin-bottom:20px;">
    <h2>Gastos</h2>

    <a href="/" class="btn btn-secondary">
        ⬅ Voltar
    </a>
</div>

@if(session('success'))
    <p style="color: red;">{{ session('success') }}</p>
@endif

<!-- RESUMO -->
<div style="margin-bottom:20px;">
    <strong>Hoje:</strong> R$ {{ $totalHoje }} <br>
    <strong>Mês:</strong> R$ {{ $totalMes }}
</div>

<!-- FORM -->
<form method="POST" action="/gastos" style="margin-bottom:30px;">
    @csrf

    <div>
        <label>Descrição:</label>
        <input type="text" name="descricao" required>
    </div>

    <div>
        <label>Valor:</label>
        <input type="number" step="0.01" name="valor" required>
    </div>

    <div>
        <label>Data:</label>
        <input type="date" name="data" required>
    </div>

    <button type="submit" class="btn btn-danger">
        Registrar Gasto
    </button>
</form>

<hr>

<!-- LISTA -->
<h3>Histórico</h3>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Data</th>
        <th>Descrição</th>
        <th>Valor</th>
    </tr>

    @foreach($gastos as $g)
        <tr>
            <td>{{ $g->data }}</td>
            <td>{{ $g->descricao }}</td>
            <td>R$ {{ $g->valor }}</td>
        </tr>
    @endforeach

</table>

@endsection