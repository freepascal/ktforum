var elixir = require('laravel-elixir');

var bowerDir = 'resources/assets/bower';

elixir(function(mix) {
    mix.sass('app.scss')
        .styles(
            [
                
            ],
            'public/css/app.css',
            bowerDir
        );

    mix.scripts(
        [
            'angular/angular.min.js',
            'angular-ui-router/release/angular-ui-router.min.js',
            'jwt-decode/build/jwt-decode.min.js'
        ],
        'public/js/lib.js',
        bowerDir
    );
});
