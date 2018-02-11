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
//   .sass('node_modules/font-awesome/less/font-awesome.less','public/pc/css')
   .sass('resources/assets/pc/sass/common/common.scss', 'public/pc/css/')
   .sass('resources/assets/pc/sass/item.scss', 'public/pc/css/')
   .sass('resources/assets/pc/sass/admin/app.scss', 'public/pc/css/admin/')
   .sass('resources/assets/pc/sass/admin/login.scss', 'public/pc/css/admin')
   .sass('resources/assets/pc/sass/admin/admin.scss', 'public/pc/css/admin');
