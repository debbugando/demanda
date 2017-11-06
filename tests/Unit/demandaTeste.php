<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use demanda\User;

class demandaTest extends TestCase
{    
    
	protected $user;
    /**
     * Verifica se o usuário possui sessão no sistem, senão redireciona para o login
     * @return bool    
     */
    public function testUsuarioSemSessao()
    {
        $response = $this->get('/');
        $response->assertStatus(302);
    }

    /**
     * Login utilizando o factory method para criar um usuário e logar no sistema
     * @return bool    
     */
    public function testLoginSessao()
    {
        $this->user = factory(User::class)->create();        
        $response = $this->actingAs($this->user,'api')
                         ->withSession(['foo' => 'bar'])
                         ->get('/');
        $response->assertStatus(200);                         
    }
}