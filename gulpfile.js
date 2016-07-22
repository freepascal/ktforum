var elixir = require('laravel-elixir');

var bowerDir = 'resources/assets/bower';

elixir(function(mix) {
    mix.sass('app.scss')
        .styles(
            [
                'Materialize/dist/css/materialize.min.css'
            ],
            'public/css/app.css',
            bowerDir
        );

    mix.scripts(
        [
            'jquery/dist/jquery.min.js',
            'Materialize/dist/js/materialize.min.js',
            'angular/angular.min.js',
            'angular-ui-router/release/angular-ui-router.min.js'
        ],
        'public/js/lib.js',
        bowerDir
    );
});
