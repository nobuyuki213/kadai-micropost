@extends('layouts.app')

@section('title', 'top')

@section('content')
<div class="center jumbotron" style="background: rgba(240, 240, 240, 0.9);">
    <div class="text-center">
        <h1>Welcome to the Microposts</h1>
        {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-primary btn-lg']) !!}
    </div>
</div>
@endsection
