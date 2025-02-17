const mix = require("laravel-mix");

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

mix.js('node_modules/swiper/swiper-bundle.min.js', 'public/js')
 .js('node_modules/gsap/dist/gsap.min.js', 'public/js')
 .postCss('node_modules/swiper/swiper-bundle.min.css', 'public/css')

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/common.scss", "public/css")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);

mix.browserSync({
    proxy: "localhost",
    port: "8080",
    open: false,
});
