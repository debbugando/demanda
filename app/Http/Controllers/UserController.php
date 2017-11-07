<?php

namespace demanda\Http\Controllers;

use Illuminate\Support\Facades\DB;
use demanda\User;
use Request;
use demanda\Http\Requests\UsersRequest;

/**
* Classe dos USuários
*/
class UserController extends Controller
{

    /**
    * Método que retorno a listagem total de produtos
    * @var array
    */
    public function lista()
    {
      //Busca produtos paginando por 10 resultados
      $usuarios = User::paginate(10);
      //Verifica se retornou resultado, senão esvazia o array para exibir "sem registros"
      if(count($usuarios)==0){
    		$usuarios = null;
    	}
      return view('usuario.listagem')->with('usuarios',$usuarios);
    }

    /**
     * Método de exibiçao de um formulário de criaçao de um usuário
     * @var array
     */
    public function formulario()
    {
    	return view('usuario.formulario');
    }

    /**
     * Método de criaçao de um novo usuário
     * @var array
     */
    public function cadastra(UsersRequest $request)
    {
      //Recebendo os valores enviados da requisição e inserindo pelo factory method
    	if(User::create($request->all())){
        $msg = 'Usuario '.$request->name.' Inserido';
        $statusMsg = 'success';
      }else{
        $msg = 'Erro ao Inserir Usuário';
        $statusMsg = 'danger';
      }

      //Retorna da mensagem no flashdata
      \Session::flash('msg',$msg);
      \Session::flash('statusMsg',$statusMsg);
    	//Redireciona para a listagem
    	return redirect()->action('UserController@lista')->withInput(Request::only('name'));
    }
}
