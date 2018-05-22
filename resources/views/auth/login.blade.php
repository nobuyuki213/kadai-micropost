@extends('layouts.app')

@section('title', 'login')

@section('content')
    <div class="text-center">
        <h1>Log in</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                {!! Form::button('<span class="glyphicon glyphicon-log-in"></span> Log in', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
                <p>New User? {!! link_to_route('signup.get', 'Sign up now!') !!}</p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection