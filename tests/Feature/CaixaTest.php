<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CaixaTest extends TestCase
{
    use RefreshDatabase;

    public function test_sistema_deve_registrar_um_conserto_com_sucesso()
    {
        $user = User::factory()->create();

        // Enviamos os dados exatos que o seu formulário e o banco exigem
        $response = $this->actingAs($user)->post('/atendimentos', [
            'tipo' => 'conserto',
            'observacao' => 'Troca de tela frontal', // Atualizado para o nome correto
            'valor' => 150.00,
            'data' => now()->format('Y-m-d'), // Injetamos a data atual dinamicamente!
        ]);

        // Agora sim, deve retornar 302 (Redirecionamento de sucesso)
        $response->assertStatus(302); 

        // Valida se salvou certinho
        $this->assertDatabaseHas('atendimentos', [
            'tipo' => 'conserto',
            'valor' => 150.00,
        ]);
    }
}