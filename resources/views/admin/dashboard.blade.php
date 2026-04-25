@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<!-- 🔥 TOPO COM BOTÕES -->
<div style="display:flex; justify-content: space-between; align-items:center; margin-bottom:20px;">

    <h2>Dashboard</h2>

    <div style="display:flex; gap:10px;">

        <a href="/" class="btn btn-secondary">
            ⬅ Home
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">
                🚪 Logout
            </button>
        </form>

    </div>

</div>

<hr>

<!-- 🔥 CARDS -->
<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <div style="padding:20px; border:1px solid #ccc; border-radius:10px; min-width:200px;">
        <h3>💰 Entradas</h3>
        <p>R$ {{ $entradas ?? 0 }}</p>
    </div>

    <div style="padding:20px; border:1px solid #ccc; border-radius:10px; min-width:200px;">
        <h3>💸 Saídas</h3>
        <p>R$ {{ $saidas ?? 0 }}</p>
    </div>

    <div style="padding:20px; border:1px solid #ccc; border-radius:10px; min-width:200px;">
        <h3>📊 Lucro</h3>
        <p>R$ {{ $lucro ?? 0 }}</p>
    </div>

</div>

<!-- 🔥 ATENDIMENTOS -->
<hr>

<h3>📋 Últimos Atendimentos</h3>

<table border="1" width="100%" cellpadding="10" style="margin-top:15px;">
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