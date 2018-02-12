@extends('layouts.app')


@section('title','Listado de Tags')

@section('content')

    <a href="{{route('tags.create')}}" class="btn btn-info">Registrar un nuevo tag</a><br><br>
    <!-- BUSCADOR DE TAGS -->
        {!! Form::open(['route' => 'tags.index', 'method' => 'GET', 'class' => 'navbar-form pull-right']) !!}
            <div class="input-group">
                {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Buscar Tag...',
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
        <th>Nombre</th>
        <th>Accion</th>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="{{route('tags.edit',$tag->id)}}"
                           class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a>
                        <a href="{{route('tags.destroy',$tag->id)}}"
                           class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $tags->render() !!}
    </div>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

@endsection