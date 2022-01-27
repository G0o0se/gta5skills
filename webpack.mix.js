const mix = require('laravel-mix');

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

mix.less('resources/assets/less/app.less', 'public/assets/css').options({
        postCss: [
            require('postcss-css-variables')()
        ]
    })
    .copy('resources/assets/images/', 'public/assets/images')
    .copy('resources/assets/css/', 'public/assets/css')
    .copy('resources/assets/js/', 'public/assets/js')
    .copy('resources/assets/admin/', 'public/assets/admin')
    .version();
