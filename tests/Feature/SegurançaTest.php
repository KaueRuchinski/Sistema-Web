<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SegurancaTest extends TestCase
{
    use RefreshDatabase;

    public function test_tela_de_login_deve_estar_acessivel()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_usuario_nao_logado_nao_pode_acessar_dashboard()
    {
        // Tenta acessar o dashboard sem estar logado
        $response = $this->get('/dashboard'); 
        
        // O Laravel deve bloquear e mandar para a tela de login
        $response->assertRedirect('/login'); 
    }
}