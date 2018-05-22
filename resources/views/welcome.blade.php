@extends('layouts.app')

@section('title', 'top')

@section('content')
    @if(Auth::check())
        <?php $user = Auth::user() ?>
        {{ $user->name }}
    @else
        <div class="jumbotron" style="background: rgba(240, 240, 240, 0.9);">
            <div class="text-center">
                <h1>Welcome to the Microposts</h1>
                {!! link_to_route('signup.get', 'Sign up now!', null, ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
        </div>
    @endif
@endsection
