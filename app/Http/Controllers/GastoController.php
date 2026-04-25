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

    public function edit($id)
    {
        $gasto = \App\Models\Gasto::findOrFail($id);
        
        return view('gastos.edit', compact('gasto'));
    }


    public function update(Request $request, $id)
    {
        $gasto = \App\Models\Gasto::findOrFail($id);

        $gasto->update([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data' => $request->data,
        ]);

        return redirect('/gastos')->with('success', 'Atualizado com sucesso!');
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