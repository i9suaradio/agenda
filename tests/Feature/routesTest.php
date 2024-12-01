<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Cliente;

class RoutesTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_se_a_rota_dashboard_esta_respondendo(): void
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_se_a_rota_clientes_esta_respondendo(): void
    {
        $response = $this->get('/clientes');
        $response->assertStatus(200);
    }

    public function test_se_a_rota_cliente_esta_respondendo(): void
    {
        $response = $this->get('/cliente');
        $response->assertStatus(200);
    }

    public function test_se_a_rota_agenda_esta_respondendo(): void
    {
        $response = $this->get('/agenda');
        $response->assertStatus(200);
    }

    public function test_se_a_rota_agendadodia_esta_respondendo(): void
    {
        $response = $this->get('/agendadodia');
        $response->assertStatus(200);
    }

}
