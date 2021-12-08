const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');


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

mix.js('resources/js/app.js', 'public/js');
    // .extract(['quill']);

mix.sass('resources/sass/app.scss', 'public/css')
    .options({
        postCss: [ tailwindcss('./tailwind.config.js') ]
    });

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({
    proxy: process.env.MIX_BROWSERSYNC_PROXY,
    open: false,
    socket: {
        domain: 'laravel.localhost'
    }
});

mix.disableNotifications();
