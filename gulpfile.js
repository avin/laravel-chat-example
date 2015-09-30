var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix.less('app.less');
    mix.less(['master.less'], 'public/css/master.css');

    mix.copy('resources/assets/bower/font-awesome/fonts/', 'public/fonts/');
    mix.copy('resources/assets/bower/select2/dist/css/select2.css', 'public/css/');
});
