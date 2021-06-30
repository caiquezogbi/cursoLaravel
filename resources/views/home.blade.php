@extends('layout.site')

@section('titulo', 'cursos')

@section('conteudo')

<div class="container">
    <h3 class="center">lista de cursos</h3>

    <div class="row">
        @foreach($cursos as $curso)
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="{{asset($curso->imagem)}}" width="100" height="400">
                </div>
                <div class="card-content">
                    <h4>{{$curso->titulo}}</h4>
                    <p>{{$curso->descricao}}</p>
                </div>
                <div class="card-action">
                    <a href="#">ver mais</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row " align="center " background="white" ;>
        {{$cursos->links()}}


    </div>

</div>


@endsection