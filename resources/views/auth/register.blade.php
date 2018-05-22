@extends('layouts.app')

@section('title', 'signup')

@section('content')
    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'name']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'example@example.com']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'password']) !!}
                </div>
                {!! Form::button('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign up', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection