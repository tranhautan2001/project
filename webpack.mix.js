// webpack.mix.js
let mix = require('laravel-mix');
// mix.js('resources/js/app.js', 'public/js')
mix.js('resources/js/app.js', 'public/js/app.min.js')
   .sass('public/sass/header.scss', 'public/css').minify('public/css/header.css')
   .sass('public/sass/category.scss', 'public/css').minify('public/css/category.css')
   .sass('public/sass/detail.scss', 'public/css').minify('public/css/detail.css')
   .sass('public/sass/cart.scss', 'public/css').minify('public/css/cart.css')
   .sass('public/sass/checkout.scss', 'public/css').minify('public/css/checkout.css')

   .setPublicPath('public');    