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

mix.options({
    processCssUrls: false
});
    
if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    })
    .sourceMaps()
}
    
mix.sass('resources/scss/app.scss', 'public/css')
   .sass('resources/scss/react-app.scss', 'public/css')
   .js('resources/js/app.js', 'public/js')
   .react('resources/js/react-app/index.jsx', 'public/js/react-app.js')

    
    .browserSync({
        host: 'localhost',
        port: 3000,
        proxy: {
            target: process.env.APP_URL
        }
    });
    
// add versioning (creates mix.manifest.json)
mix.version();    