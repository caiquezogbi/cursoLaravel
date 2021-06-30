<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Curso;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(3); //substituindo o all pelo paginate para colocar limite de imagem na tela
        return view('home', compact('cursos'));
    }
}
