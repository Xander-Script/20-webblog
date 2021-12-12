const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

require('laravel-mix-purgecss');


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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .options({
        // processCssUrls: false,
        postCss: [ tailwindcss('./tailwind.config.js') ]
    });

    // .purgeCss({
    //     enabled: true
    // });

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({
    proxy: {
        target: process.env.MIX_BROWSERSYNC_PROXY,
        proxyOptions: {
            xfwd: true // send x-forwarded-for header
        }
    },
    open: false,
    socket: {
        domain: 'laravel.localhost'
    }
});

mix.disableNotifications();
