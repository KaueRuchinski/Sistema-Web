@extends('layouts.master')

@section('content')

<h2>Editar Gasto</h2>

<form method="POST" action="/gastos/{{ $gasto->id }}">
    @csrf
    @method('PUT')

    <label>Descrição:</label>
    <input type="text" name="descricao" value="{{ $gasto->descricao }}">

    <label>Valor:</label>
    <input type="number" step="0.01" name="valor" value="{{ $gasto->valor }}">

    <label>Data:</label>
    <input type="date" name="data" value="{{ $gasto->data }}">

    <button class="btn btn-primary">Atualizar</button>

</form>

@endsection