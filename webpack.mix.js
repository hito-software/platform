const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/bootstrap.js', 'public/js')
    .js('resources/js/bootstrap-app.js', 'public/js')
    .js('resources/js/bootstrap-react.js', 'public/js')
    .js('resources/js/app.js', 'public/js')
    .sass('resources/scss/base.scss', 'public/css/base.css')
    .sass('resources/scss/app.scss', 'public/css/style.css')
    .sourceMaps()
    .react()
    .extract(['react'])
    .options({
        processCssUrls: false,
        postCss: [require('tailwindcss')],
    });
