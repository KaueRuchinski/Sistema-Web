@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div style="display:flex; justify-content: space-between; align-items:center;">
    <h2>Dashboard</h2>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">
            Logout
        </button>
    </form>
</div>

<hr>

<div style="display:flex; gap:20px; flex-wrap:wrap;">

    <div style="padding:20px; border:1px solid #ccc; border-radius:10px;">
        <h3>💰 Entradas</h3>
        <p>R$ {{ $entradas ?? 0 }}</p>
    </div>

    <div style="padding:20px; border:1px solid #ccc; border-radius:10px;">
        <h3>💸 Saídas</h3>
        <p>R$ {{ $saidas ?? 0 }}</p>
    </div>

    <div style="padding:20px; border:1px solid #ccc; border-radius:10px;">
        <h3>📊 Lucro</h3>
        <p>R$ {{ $lucro ?? 0 }}</p>
    </div>

</div>

@endsection