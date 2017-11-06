<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use demanda\User;
use demanda\Produto;

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

    public function testCriaUser()
    {
        $this->user = factory(User::class)->create();
        return $this->user;                       
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

    public function testUsuarioLoga()
    {
        $this->testCriaUser();
        $this->get('/login');
        $this->type($this->user->email, 'email');
        $this->type($this->user->password, 'password');
        $this->press('Login');
        $this->seePageIs(route('produtos'));
    }

    public function testCriaProduto()
    {
        $produto = factory(Produto::class)->create();        
        //$response = $this->get('/produtos');
        //$response->assertStatus(200);                         
    }
}
