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
      //Busca produtos paginando por 10 resultados
      $produtos = Produto::paginate(10);
    	//Verifica se retornou resultado, senão esvazia o array para exibir "sem registros"
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
    	//Verifica se retornou resultado, senão esvazia o array para exibir "sem registros"
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
        //Busca produto pelo id enviado
        $produto = Produto::find($id);
        //Retorna resultado para a view
        return view('produto.formulario')->withProduto($produto);
     }

     /**
      * Método de atualização de um produto
      * @var array
      */
     public function atualiza(ProdutosRequest $request)
     {
        //Recebendo os valores enviados da requisição
        $produto = Produto::find($request->id);

        if(!empty($produto)){
          //Armazena os dados antigos para retorno da mensagem
          $nomeAntigo = $produto->nome;

          $produto->nome       = $request->nome;
          $produto->valor      = $request->valor;
          $produto->descricao  = $request->descricao;
          $produto->quantidade = $request->quantidade;

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
        }else{
          //Retorna da mensagem no flashdata
          \Session::flash('msg','Produto Inválido');
          \Session::flash('statusMsg','danger');
        }
        //Redireciona para a listagem
        return redirect()->action('ProdutoController@lista');
     }

    /**
     * Método de Remoçao de um produto
     * @var array
     */
     public function remove($id)
     {
       //Busca produto pelo id enviado
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
