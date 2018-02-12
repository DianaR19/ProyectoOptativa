@extends('layouts.app')

@section('title','Crear Usuario')

@section('content')

    {!! Form::open(['route' => 'users.store','method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name',null,['class' => 'form-control','placeholder' => 'Nombre Completo','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email','Correo Electronico') !!}
            {!! Form::text('email',null,['class' => 'form-control','placeholder' => 'example@hotmail.com','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password','Contraseña') !!}
            {!! Form::password('password',['class' => 'form-control','placeholder' => '*********','required']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('type','Tipo') !!}
            {!! Form::select('type', [ 'admin' => 'Administrador','member' => 'Miembro'], 0,['class' => 'form-control',
                'placeholder' => 'Seleccione una opcion', 'required']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Registrar',['class' => 'btn btn-primary']) !!}
        </div>

    {!! Form::close() !!}

@endsection
