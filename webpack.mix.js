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
mix.setPublicPath('./app/handlers')

mix.js('./app/resources/js/app.js', 'app.js')
    .sass('./app/resources/sass/app.scss', 'style.css');

mix.browserSync({
    notify: false, host: 'localhost', port: '3000',
    proxy: {
        target: 'http://127.0.0.1:8000',
        reqHeaders: {'Host': 'localhost:3000'}
    }
});
