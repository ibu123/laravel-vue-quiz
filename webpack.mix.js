const mix = require('laravel-mix');
const path = require('path');

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

mix
    .alias({
        ziggy: path.resolve('vendor/tightenco/ziggy/src/js/vue.js'), // or 'vendor/tightenco/ziggy/dist/vue' if you're using the Vue plugin
    })
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/quiz.js', 'public/js')
    .vue()
    .version()
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
