<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;
use Auth; //autenticar usuario

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function entrar(Request $req)
    {
        $dados = $req->all();  // listando todos os dados cadastrados

        if (Auth::attempt(['email' => $dados['email'],  'password' => $dados['senha']]))  //verificar se o usuarios esta cadastrado
        {
            return redirect()->route('admin.cursos');
        }


        return redirect()->route('login.index');
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}
