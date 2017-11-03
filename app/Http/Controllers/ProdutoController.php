<?php

namespace demanda\Http\Controllers;

use Illuminate\Support\Facades\DB;
use demanda\Produto;
use Request;
use demanda\Http\Requests\ProdutosRequest;

/**
* Classe dos Produtos
*/
class ProdutoController extends Controller
{
	 /**
     * Método que retorno a listagem total de produtos
     * @var array
     */
    public function lista()
    {

    	$produtos = Produto::all();
    	//Busca todos os produtos
    	if(count($produtos)==0){
    		$produtos = null;
    	}
    	//Retorna para a view os produtos encontrados
    	return view('produto.listagem')->withProdutos($produtos);
    }

    /**
     * Método que retorno detalhes de um produto
     * @var array
     */
    public function exibe($id)
    {
    	//Busca o produto do id enviado
    	$produto = Produto::find($id);
    	//Busca todos os produtos
    	if(count($produto)==0){
    		$produto = null;
    	}
    	//Retorna para a view o produto encontrado
    	return view('produto.detalhes')->withProduto($produto);
    }

    /**
     * Método de exibiçao de um formulário de criaçao de um produto
     * @var array
     */
    public function formulario()
    {
    	return view('produto.formulario');
    }

    /**
     * Método de criaçao de um novo produto
     * @var array
     */
    public function cadastra(ProdutosRequest $request)
    {
      //Recebendo os valores enviados da requisição e inserindo pelo factory method
    	if(Produto::create($request->all())){
        $msg = 'Produto '.$request->nome.' Inserido';
        $statusMsg = 'success';
      }else{
        $msg = 'Erro ao Inserir Produto';
        $statusMsg = 'danger';
      }

      //Retorna da mensagem no flashdata
      \Session::flash('msg',$msg);
      \Session::flash('statusMsg',$statusMsg);
    	//Redireciona para a listagem
    	return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    /**
     * Método de exibiçao de um formulário de edição de um produto
     * @var array
     */
     public function edita($id)
     {
         $produto = Produto::find($id);
         return view('produto.formulario')->withProduto($produto);
     }

     /**
      * Método de atualização de um produto
      * @var array
      */
     public function atualiza(ProdutosRequest $request)
     {
         //Recebendo os valores enviados da requisição
         $produto = Produto::find(Request::input('id'));

         //Armazena os dados antigos para retorno da mensagem
         $nomeAntigo = $produto->nome;

         $produto->nome       = Request::input('nome');
         $produto->valor      = Request::input('valor');
         $produto->descricao  = Request::input('descricao');
         $produto->quantidade = Request::input('quantidade');

         if($produto->save()){
           $msg = 'Produto Atualizado de '.$nomeAntigo.' Para: '.$produto->nome;
           $statusMsg = 'success';
         }else{
           $msg = 'Erro ao Atualizar Produto '.$nomeAntigo;
           $statusMsg = 'danger';
         }

         //Retorna da mensagem no flashdata
         \Session::flash('msg',$msg);
         \Session::flash('statusMsg',$statusMsg);
         //Redireciona para a listagem
         return redirect()->action('ProdutoController@lista');
     }

    /**
     * Método de Remoçao de um produto
     * @var array
     */
     public function remove($id)
     {
     	$produto = Produto::find($id);

       //Verifica se o produto foi removido e retorna a mensagem de acordo
       if($produto->delete()){
         $msg = 'Produto '.$produto->nome.' Removido com Sucesso.';
         $statusMsg = 'success';
       }else{
         $msg = 'Erro ao Remover Produto '.$produto->nome;
         $statusMsg = 'danger';
       }

       //Retorna da mensagem no flashdata
       \Session::flash('msg',$msg);
       \Session::flash('statusMsg',$statusMsg);
     	//Redireciona para a listagem
     	return redirect()->action('ProdutoController@lista');
     }
}
