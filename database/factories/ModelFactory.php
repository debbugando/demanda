<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(demanda\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(demanda\Produto::class, function (Faker\Generator $faker) {
  return [
      'data' => date('Y-m-d H:i:s'),
      'nome' => $faker->word,
      'descricao' => $faker->word,
      'valor' => $faker->randomFloat,
      'quantidade' => $faker->randomNumber,
      'usuario_criou' => 1,
    ];
});
