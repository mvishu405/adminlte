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

mix.webpackConfig({
    resolve: {
        extensions: [".webpack.js", ".web.js", ".js", ".json", ".less"]
    }
});

mix
    .js('resources/assets/js/app.js', 'public/js')

    .sass('resources/assets/sass/app.scss', 'public/css')

    .less('resources/assets/less/adminlte-app.less', 'public/css/adminlte-app.css')

    .combine([
        'public/css/app.css',
        'public/css/adminlte-app.css',
        'node_modules/admin-lte/dist/css/skins/_all-skins.css',
        'node_modules/icheck/skins/square/blue.css',
    ], 'public/css/all.css')

    //VENDOR RESOURCES
    .copy('node_modules/font-awesome/fonts/*.*', 'public/fonts/')
    .copy('node_modules/ionicons/dist/fonts/*.*', 'public/fonts/')
    .copy('node_modules/admin-lte/bootstrap/fonts/*.*', 'public/fonts/bootstrap')
    .copy('node_modules/admin-lte/dist/img', 'public/img')
    .copy('node_modules/icheck/skins/square/blue.png', 'public/css')
    .copy('node_modules/icheck/skins/square/blue@2x.png', 'public/css')

    .sourceMaps()

    .options({
        processCssUrls: false
    })

    .browserSync({
        proxy: 'localhost:8000'
    });
