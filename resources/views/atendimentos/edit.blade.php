@extends('layouts.master')

@section('content')

<h2>Editar Atendimento</h2>

<form method="POST" action="/atendimentos/{{ $atendimento->id }}">
    @csrf
    @method('PUT')

    <label>Tipo:</label>
    <input type="text" name="tipo" value="{{ $atendimento->tipo }}">

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor" value="{{ $atendimento->valor }}">

    <label>Data:</label>
    <input type="date" name="data" value="{{ $atendimento->data }}">

    <label>Observação:</label>
    <textarea name="observacao">{{ $atendimento->observacao }}</textarea>

    <button class="btn btn-primary">Atualizar</button>

</form>

@endsection