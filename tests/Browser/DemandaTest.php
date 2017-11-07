<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use demanda\User;
use demanda\Produto;

class DemandaTest extends DuskTestCase
{
    /**
     * Verifica se o usuário possui sessão no sistema, senão redireciona para o login
     * @return bool
     */
    public function testUsuarioSemSessao()
    {
        $this->browse(function ($browser) {
            $browser->visit('/')
                    ->assertSee('Login')
                    ->assertPathIs('/login');
        });
    }

    /**
     * Insere um usuário inválido para verificar a autenticação
     * @return bool
     */
    public function testUsuarioInvalido()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'teste@xpto.com')
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertSee('Essas credenciais não correspondem aos nossos registros.')
                    ->assertPathIs('/login');
        });
    }

    /**
     * Login utilizando o factory method para criar um usuário e logar no sistema
     * @return void
     */
    public function testLoginSessao()
    {
        //Cria usuário
        $user = factory(User::class)->create();
        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login');
        });
    }

    /**
     * Criando Produto utilizando o factory method
     * @return void
     */
    public function testCriaProduto()
    {
        //Cria produto aleatório para preencher os campos
        $produto = factory(Produto::class)->make();
        $this->browse(function ($browser) use ($produto){
            $browser->visit('/produtos/formulario')
                    ->type('nome', $produto->nome)
                    ->type('descricao', $produto->descricao)
                    ->type('valor', $produto->valor)
                    ->type('quantidade', $produto->quantidade)
                    ->press('Salvar')
                    ->assertSee('Produto '. $produto->nome .' Inserido')
                    ->assertPathIs('/produtos');
        });
    }

    /**
     * Editando o último Produto inserido na função testCriaProduto()
     * @return void
     */
    public function testEditaProduto()
    {
        $produto = Produto::latest('id')->first();
        $produto->novoNome = "Produto Teste Editado {$produto->id}";

        $this->browse(function ($browser) use($produto){
          $browser->visit("/produtos")
            ->click('.ultimoAltera')
            ->assertSee("Detalhes Produto")
            ->type('nome', $produto->novoNome)
            ->press('Editar')
            ->assertSee("Produto Atualizado")
            ->assertPathIs('/produtos');
      });
    }

    /**
     * Removendo o último Produto inserido na função testCriaProduto()
     * @return void
     */
    public function testRemoveProduto()
    {
        $produto = Produto::orderBy('id', 'desc')->first();
        $this->browse(function ($browser) use ($produto){
            $browser->visit('/produtos/remove/'.$produto->id)
                    ->assertSee("Produto {$produto->nome} Removido com Sucesso.")
                    ->assertPathIs('/produtos');
        });
    }

    /**
     * Encerra sessão
     * @return bool
     */
    public function testEncerraSessao()
    {
        $this->browse(function ($browser) {
            $browser->click('.dropDownUser')
                    ->click('#logout')
                    ->assertSee('Login')
                    ->assertPathIs('/login');
        });
    }
}
