@extends('layouts.app')

@section('title','Editar Usuario ' . $user->name)

@section('content')

    {!! Form::open(['route' => ['users.update',$user->id],'method' => 'PATCH']) !!}
        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',$user->name,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Correo Electronico') !!}
            {!! Form::text('email',$user->email,['class' => 'form-control','placeholder' => 'example@hotmail.com','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type','Tipo') !!}
            {!! Form::select('type',['member' => 'Miembro','admin' => 'Administrador'],
            $user->type,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar',['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@endsection