@extends('layouts.app')

@section('title', 'top')

@section('content')
<div class="center jumbotron" style="background: rgba(240, 240, 240, 0.9);">
    <div class="text-center">
        <h1 class="display-4 font-weight-normal">Welcome to the Microposts</h1>
        {!! link_to('/', 'Sign up now!', ['class' => 'btn btn-primary btn-lg']) !!}
    </div>
</div>
@endsection
