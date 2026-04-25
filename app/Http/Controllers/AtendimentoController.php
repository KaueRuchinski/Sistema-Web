<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    public function index()
        {
            $atendimentos = Atendimento::latest()->get();

            $totalHoje = Atendimento::whereDate('data', now())->sum('valor');
            $totalMes = Atendimento::whereMonth('data', now()->month)->sum('valor');

            return view('atendimentos.index', compact('atendimentos', 'totalHoje', 'totalMes'));
        }


    public function edit($id)
        {
            $atendimento = \App\Models\Atendimento::findOrFail($id);
            return view('atendimentos.edit', compact('atendimento'));
        }

    public function update(Request $request, $id)
        {
            $atendimento = \App\Models\Atendimento::findOrFail($id);

            $atendimento->update([
                'tipo' => $request->tipo,
                'valor' => $request->valor,
                'data' => $request->data,
                'observacao' => $request->observacao,
            ]);

            return redirect('/atendimentos')->with('success', 'Atualizado com sucesso!');
        }

    public function store(Request $request)
        {
            Atendimento::create([
                'tipo' => $request->tipo,
                'valor' => $request->valor,
                'observacao' => $request->observacao,
                'data' => $request->data,
            ]);

            return redirect()->back()->with('success', 'Atendimento salvo!');
        }
}
