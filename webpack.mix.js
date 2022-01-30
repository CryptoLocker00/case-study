const mix = require('laravel-mix');
const tailwindcss = require("tailwindcss");

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

mix.js('resources/js/app/app.js', 'public/js')
    .js('resources/js/backend/backend.js', 'public/js')
    .sass('resources/sass/app/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    }).sass('resources/sass/backend/backend.scss', 'public/css');

mix.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');

if (mix.inProduction()) {
    mix.version();
}
