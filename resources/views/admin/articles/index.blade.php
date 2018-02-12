@extends('layouts.app')

@section('title','Listas de Articulos')

@section('content')
    <a href="{{ route('articles.create') }}" class="btn btn-info">Registrar nuevo articulo</a>
    <!-- BUSCADOR DE ARTICULO -->
    {!! Form::open(['route' => 'articles.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
        <div class="input-group">
            {!! Form::text('title',null,['class' => 'form-control','placeholder' => 'Buscar Articulo...',
                'aria-describedby' => 'search']) !!}
            <span class="input-group-addon" id="search">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </span>

        </div>
    {!! Form::close() !!}
    <!-- FIN DE BUSCADOR -->
    <table class="table table-striped">
        <thead>
            <th>ID</th>
            <th>Titulo</th>
            <th>Categoria</th>
            <th>User</th>
            <th>Accion</th>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->category->name}}</td>
                    <td>{{$article->user->name}}</td>
                    <td>
                        <a href="{{ route('articles.edit',$article->id)}}"
                           class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{ route('articles.destroy',$article->id)}}"
                           class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <div class="text-center">
        {!! $articles->render() !!}
    </div>
@endsection