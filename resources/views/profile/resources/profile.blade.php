@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Meu Perfil
    </h2>
@endsection

@section('content') <!-- Alterado de 'slot' para 'content' -->
    <div class="p-6 bg-white dark:bg-gray-800 shadow-sm rounded-lg">
        <h3 class="font-medium text-gray-700 dark:text-gray-300">Informações do Usuário</h3>
        <p>Nome: {{ auth()->user()->name }}</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <!-- Adicione mais informações conforme necessário -->
    </div>
@endsection
