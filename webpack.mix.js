const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js/main.js')
   .sass('resources/assets/sass/app.scss', 'public/css/main.css');

mix.js(['node_modules/jquery.easing/jquery.easing.js', 'resources/assets/js/index.js'], 'public/js/index.js')
    .sass('resources/assets/sass/index.scss', 'public/css/index.css')
    .autoload({
        jquery: ['$', 'jQuery', 'window.jQuery']
    });


