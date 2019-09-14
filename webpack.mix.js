const mix = require('laravel-mix');
require('laravel-mix-purgecss');

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
require('laravel-mix-postcss-config');

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css')
    // .purgeCss({
    //     enabled: true
    // })
    .postCssConfig()
    .postCss('resources/css/event.css', 'public/css')
    // .purgeCss({
    //     enabled: true
    // })
    .postCssConfig();
