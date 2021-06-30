<?php

namespace Database\Seeders;

use App\Models\user;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'name' => "caique",
            'email' => "caiquezogbi2@gmail.com",
            'password' => bcrypt("123456"),
        ];
        if (user::where('email', '=', $dados['email'])->count()) {   //verificar se ja existe usuario com esse login 
            $usuario = user::where('email', '=', $dados['email'])->first(); // trazer primeiro registro que encontar
            $usuario->update($dados); //atualizar com novos dados
            echo "Usuario alterado!";
        } else {
            user::create($dados); //criando usuario caso nao exista
            echo "Usuario criado!";
        }
    }
}
