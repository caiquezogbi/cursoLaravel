<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Contato;

class ContatoController extends Controller
{
    public function index()
    {

        $contato = new Contato();
        $con = $contato->lista();
        dd($con->nome);




        return view('contato.index');
    }

    public function criar(Request $req)
    {
        dd($req['nome']);
        return "esse é o criar do  ContatoController";
    }

    public function editar(Request $req)
    {
        dd($req->all());
        return "esse é o editar do  ContatoController";
    }
}
