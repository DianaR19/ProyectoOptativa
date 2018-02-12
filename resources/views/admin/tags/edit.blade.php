@extends('layouts.app')

@section('title','Editar Tag ' . $tag->name)

@section('content')

    {!! Form::open(['route' => ['tags.update',$tag->id],'method' => 'PATCH']) !!}
    <div class="form-group">
        {!! Form::label('name','Name') !!}
        {!! Form::text('name',$tag->name,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection