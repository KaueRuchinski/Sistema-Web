@extends('layouts.master')

@section('title', 'Atendimentos')

@section('content')


<div style="margin-bottom: 20px;">
    <a href="/" class="btn btn-secondary">
        ⬅ Voltar para Home
    </a>
</div>

<h2>Atendimentos</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- RESUMO -->
<div style="margin-bottom:20px;">
    <strong>Hoje:</strong> R$ {{ $totalHoje }} <br>
    <strong>Mês:</strong> R$ {{ $totalMes }}
</div>

<!-- FORM -->
<form method="POST" action="/atendimentos" style="margin-bottom:30px;">
    @csrf

    <div>
        <label>Tipo:</label>
        <select name="tipo" required>
            <option>Venda de celular</option>
            <option>Conserto de celular</option>
            <option>Venda de chip</option>
            <option>Cadastro de chip</option>
        </select>
    </div>

    <div>
        <label>Valor:</label>
        <input type="number" step="0.01" name="valor" required>
    </div>

    <div>
        <label>Data:</label>
        <input type="date" name="data" required>
    </div>

    <div>
        <label>Observação:</label>
        <textarea name="observacao"></textarea>
    </div>

    <button type="submit" class="btn btn-success">
        Salvar Atendimento
    </button>
</form>

<hr>

<!-- LISTA -->
<h3>Histórico</h3>

<table border="1" width="100%" cellpadding="10">
    <tr>
        <th>Data</th>
        <th>Tipo</th>
        <th>Valor</th>
        <th>Observação</th>
    </tr>

    @foreach($atendimentos as $a)
        <tr>
            <td>{{ $a->data }}</td>
            <td>{{ $a->tipo }}</td>
            <td>R$ {{ $a->valor }}</td>
            <td>{{ $a->observacao }}</td>
        </tr>
    @endforeach

</table>

@endsection