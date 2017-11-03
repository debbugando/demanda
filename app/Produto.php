<?php

namespace demanda;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  //Tabela utilizada
  protected $table    = 'produtos';
  public $timestamps  = false;
  //Dados a serem prenchidos para que não ocorra erro de inserção em massa
  protected $fillable = array('nome','descricao', 'valor', 'quantidade');
  //Atributo que não poderá ser alterado
  protected $guarded  = ['id'];
}
