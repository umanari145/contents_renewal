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

mix
   .js('resources/assets/pc/js/app.js', 'public/pc/js')
   .js('resources/assets/pc/js/original.js', 'public/pc/js')
   .less('node_modules/font-awesome/less/font-awesome.less','public/pc/css')
   .less('resources/assets/pc/less/common.less', 'public/pc/css/')
   .less('resources/assets/pc/less/item.less', 'public/pc/css/');
