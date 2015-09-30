@extends('layouts.auth')

@section('content')

    {!! Former::horizontal_open()
        ->secure()
        ->action(action('Auth\PasswordController@postReset'))
        ->rules(['email' => 'required|email', 'password' => 'required', 'password_confirmation' => 'required'])
        ->method('POST') !!}

    {!! Former::legend('Reset password') !!}

    @include('errors.list')

    {!! Former::hidden('token')->value($token) !!}

    {!! Former::text('email')->autofocus() !!}
    {!! Former::password('password')->label('New password') !!}
    {!! Former::password('password_confirmation') !!}

    {!! Former::actions()
    ->large_primary_submit('Reset password')
    ->large_inverse_reset('Clear') !!}

    {!! Former::close() !!}

@stop