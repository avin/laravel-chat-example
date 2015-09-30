@extends('layouts.auth')

@section('content')

    {!! Former::horizontal_open()
        ->secure()
        ->action(action('Auth\AuthController@postLogin'))
        ->rules(['email' => 'required|email', 'password' => 'required'])
        ->method('POST') !!}

    @include('errors.list')

    {!! Former::text('email')->autofocus() !!}
    {!! Former::password('password') !!}

    {!! Former::checkbox('remember')
        ->label(' ')
        ->text('Remember me')
        ->check() !!}

    {!! Former::actions()
    ->large_primary_submit('Login')
    ->large_inverse_reset('Clear') !!}

    {!! Former::actions(
            link_to_action('Auth\PasswordController@getEmail', $title = 'Forgot password? Restore it!')
        ) !!}

    {!! Former::close() !!}

@stop
