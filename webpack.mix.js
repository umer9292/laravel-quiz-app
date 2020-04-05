let mix = require('laravel-mix');

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

mix.scripts([
    'public/js/jquery-3.3.1.min.js',
    'public/js/popper.min.js',
    'public/js/bootstrap.min.js',
    'public/js/perfect-scrollbar.jquery.min.js',
    'public/js/chartjs.min.js',
    'public/js/bootstrap-notify.js',
    'public/js/shards-dashboards.1.1.0.min.js',
    'public/js/black-dashboard.min.js',
], 'public/assets/js/vendor.js');

mix.styles([
    'public/css/font-awesome.all.min.css',
    'public/css/bootstrap.min.css',
    'public/css/black-dashboard.min.css',
    'public/css/demo.css',
], 'public/assets/css/vendor.css');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');
