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
