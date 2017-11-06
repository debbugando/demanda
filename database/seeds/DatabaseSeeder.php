<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call('ProdutoTableSeeder');
    }
}

class ProdutoTableSeeder extends Seeder {
	public function run()
	{
		DB::insert('insert into produtos
		(data,nome, quantidade, valor, descricao, usuario_criou)
		values (?,?,?,?,?,?)',
		array(date('Y-m-d H:i:s'),'Geladeira', 2, 5900.00,
		'Side by Side com gelo na porta',1));
		DB::insert('insert into produtos
		(data,nome, quantidade, valor, descricao,usuario_criou)
		values (?,?,?,?,?,?)',
		array(date('Y-m-d H:i:s'),'Fogão', 5, 950.00,
		'Painel automático e forno elétrico',1));
		DB::insert('insert into produtos
		(data,nome, quantidade, valor, descricao,usuario_criou)
		values (?,?,?,?,?,?)',
		array(date('Y-m-d H:i:s'),'Microondas', 1, 1520.00,
		'Manda SMS quando termina de esquentar',1));
	}
}