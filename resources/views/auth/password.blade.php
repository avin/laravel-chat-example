@extends('layouts.auth')

@section('content')

    {!! Former::horizontal_open()
        ->secure()
        ->action(action('Auth\PasswordController@postEmail'))
        ->rules(['email' => 'required|email'])
        ->method('POST') !!}

    {!! Former::legend('Restore password') !!}

    @include('errors.list')

    {!! Former::text('email')->autofocus() !!}

    {!! Former::actions()
        ->large_primary_submit('Send restore password instructions')
        ->large_inverse_reset('Clear') !!}

    {!! Former::close() !!}

@stop