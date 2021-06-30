<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $registros = Curso::all();
        return view('admin.cursos.index', compact('registros'));
    }

    public function adicionar()
    {

        return view('admin.cursos.adicionar');
    }

    public function salvar(request $req)
    {
        $dados = $req->all();

        if (isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }


        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem'); //recebe imagem
            $num = rand(1111, 9999);   //renome imagem
            $dir = "img/cursos/";  //definindo diretorio 
            $ex = $imagem->guessClientExtension();   //pegar extension do arquivo com metodo do laravel
            $nomeImagem = "imagem_" . $num . "." . $ex;  //criando nome da imagem e concatenando com numero e extesion
            $imagem->move($dir, $nomeImagem);  //movendo imagem para o diretorio 
            $dados['imagem'] = $dir . "/" . $nomeImagem; //atribuindo caminho da imagem para ser salva no banco de dados

        }

        Curso::create($dados); //salvar dados

        return redirect()->route('admin.cursos'); //encaminhar para listar 

    }


    public function editar($id)
    {
        $registro = curso::find($id);
        return view('admin.cursos.editar', compact('registro'));
    }


    public function atualizar(request $req, $id)
    {
        $dados = $req->all();

        if (isset($dados['publicado'])) {
            $dados['publicado'] = 'sim';
        } else {
            $dados['publicado'] = 'nao';
        }


        if ($req->hasFile('imagem')) {
            $imagem = $req->file('imagem'); //recebe imagem
            $num = rand(1111, 9999);   //renome imagem
            $dir = "img/cursos/";  //definindo diretorio 
            $ex = $imagem->guessClientExtension();   //pegar extension do arquivo com metodo do laravel
            $nomeImagem = "imagem_" . $num . "." . $ex;  //criando nome da imagem e concatenando com numero e extesion
            $imagem->move($dir, $nomeImagem);  //movendo imagem para o diretorio 
            $dados['imagem'] = $dir . "/" . $nomeImagem; //atribuindo caminho da imagem para ser salva no banco de dados

        }

        Curso::find($id)->update($dados); //localizar o id no banco e atualizar o dado que  mudar

        return redirect()->route('admin.cursos'); //encaminhar para listar 

    }

    public function deletar($id)
    {
        Curso::find($id)->delete(); //localizando o id e deletando
        return redirect()->route('admin.cursos'); //encaminhar para listar 
    }
}
