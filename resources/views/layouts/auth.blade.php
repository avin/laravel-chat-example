<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/app.css') }}">

    <style>
        body{
            padding-top: 20px;
        }
    </style>

    @yield('custom-style')

    <title>Shop</title>
</head>
<body>

<div class="container">

    @yield('content')

</div>

<script src="{{ asset('js/vendor.js') }}"></script>
@yield('custom-script')
</body>
</html>


