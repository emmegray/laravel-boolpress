const mix = require('laravel-mix');

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

mix
    .js('resources/js/posts/app.js', 'public/posts/js')
    .sass('resources/sass/posts/app.scss', 'public/posts/css');

mix
    .js('resources/js/admin/app.js', 'public/_admin/js')
    .sass('resources/sass/admin/app.scss', 'public/_admin/css');
