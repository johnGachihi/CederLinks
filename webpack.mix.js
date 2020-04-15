const mix = require('laravel-mix');
const dotenv = require('dotenv')


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

/**
 * For admin module
 */
mix.react('resources/js/admin/index.js', 'public/js/admin')
    .sass('resources/sass/admin/app.scss', 'public/css/admin');

/**
 * For visitors module
 */
mix.js('resources/js/visitors/app.js', 'public/js/visitors')
    .sass('resources/sass/visitors/app.scss', 'public/css/visitors/');



mix.webpackConfig(webpack => {
    const env = dotenv.config().parsed
    const envKeys = Object.keys(env).reduce((prev, next) => {
        prev[`process.env.${next}`] = JSON.stringify(env[next])
        return prev
    }, {})

    return {plugins: [new webpack.DefinePlugin(envKeys)]}
})
