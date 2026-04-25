<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::latest()->get();

        $totalHoje = Gasto::whereDate('data', now())->sum('valor');
        $totalMes = Gasto::whereMonth('data', now()->month)->sum('valor');

        return view('gastos.index', compact('gastos', 'totalHoje', 'totalMes'));
    }

    public function store(Request $request)
    {
        Gasto::create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data' => $request->data,
        ]);

        return redirect()->back()->with('success', 'Gasto registrado!');
    }
}