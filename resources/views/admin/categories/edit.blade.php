@extends('layouts.app')

@section('title','Editar Categoria ' . $category->name)

@section('content')

    {!! Form::open(['route' => ['categories.update',$category->id],'method' => 'PATCH']) !!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',$category->name,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@endsection