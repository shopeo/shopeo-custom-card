const mix = require('laravel-mix');

mix.copyDirectory('./node_modules/@fortawesome/fontawesome-free/webfonts', './assets/fonts');

mix.options({
    processCssUrls: false
});

mix.sass('assets/src/scss/backend.scss', 'assets/css', [], [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]).sass('assets/src/scss/backend-rtl.scss', 'assets/css/backend-rtl.css', [], [
    require('postcss-import'),
    require('tailwindcss'),
    require('rtlcss'),
    require('autoprefixer'),
]).sass('assets/src/scss/frontend.scss', 'assets/css', [], [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
]).sass('assets/src/scss/frontend-rtl.scss', 'assets/css/frontend-rtl.css', [], [
    require('postcss-import'),
    require('tailwindcss'),
    require('rtlcss'),
    require('autoprefixer'),
]).js('assets/src/js/backend.js', 'assets/js').js('assets/src/js/frontend.js', 'assets/js').vue();