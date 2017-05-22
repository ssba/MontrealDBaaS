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

mix.js('resources/assets/js/admin.js', 'public/js/admin.js')
    .sass('resources/assets/sass/admin.scss', 'public/css/admin.css');

mix.js('resources/assets/js/index.js', 'public/js/index.js')
    .sass('resources/assets/sass/index.scss', 'public/css/index.css');

mix.js('resources/assets/js/views/admin.db.all.js', 'public/js/alldbs.js')
    .sass('resources/assets/sass/AdminLTE/admin.db.all.scss', 'public/css/alldbs.css');

mix.js('resources/assets/js/views/admin.home.js', 'public/js/home.js');
/*
 .minify('public/js/index.js')
 ;.uglify()
 .version()
 */