@extends('layouts.auth')

@section('custom-style')
    <style>
        body {
            padding-top: 20px;
        }
    </style>
@stop

@section('content')

    {!! Former::horizontal_open()
        ->secure()
        ->action(action('Auth\AuthController@postRegister'))
        ->rules(['name' => 'required', 'email' => 'required|email', 'password' => 'required'])
        ->method('POST') !!}

    {!! Former::legend('Registration') !!}

    @include('errors.list')

    {!! Former::text('name')->autofocus() !!}
    {!! Former::text('email') !!}

    {!! Former::password('password') !!}
    {!! Former::password('password_confirmation') !!}

    <hr>

    {!! Former::actions()
        ->large_primary_submit('Register')
        ->large_inverse_reset('Clear') !!}

    {!! Former::actions(
            link_to_action('Auth\AuthController@getLogin', $title = 'Already registered? Log in!')
        ) !!}

    {!! Former::close() !!}

@stop