<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/master.css') }}">

    @yield('custom-style')
    @include("layouts.partials.jsVariables")
</head>
<body>



<div class="container">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <!-- The mobile navbar-toggle button can be safely removed since you do not need it in a non-responsive implementation -->
                <a class="navbar-brand" href="#">MyChat</a>
            </div>
            <!-- Note that the .navbar-collapse and .collapse classes have been removed from the #navbar -->
            <div id="navbar">
                <ul class="nav navbar-nav">
                    <li class="{{ str_contains(Route::currentRouteAction(), ['ChatController@index']) ? 'active' : '' }}"><a href="{!! action('Front\ChatController@index') !!}">Chat</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li>{!! link_to_action('Auth\AuthController@getLogout', $title = 'Logout') !!}</li>
                    @else
                        <li>{!! link_to_action('Auth\AuthController@getLogin', $title = 'Log in') !!}</li>
                        <li>{!! link_to_action('Auth\AuthController@getRegister', $title = 'Register') !!}</li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">

        @include('flash::message')

        @yield('content')

    </div>



</div>

@yield('custom-script')

</body>
</html>
