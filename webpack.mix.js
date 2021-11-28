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

mix.js('resources/js/apps/app.js', 'public/js')
    .js('resources/js/apps/app-appointments.js', 'public/js/app-appointments.js').vue()
    .js('resources/js/apps/app-calendar.js', 'public/js/app-calendar.js').vue()
    .js('resources/js/apps/app-patients.js', 'public/js/app-patients.js').vue()
    .js('resources/js/apps/app-users.js', 'public/js/app-users.js').vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ])
    .sass('resources/scss/app.scss', 'public/css')
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.tsx?$/,
                    loader: 'ts-loader',
                    exclude: /node_modules/,
                    options: {
                        appendTsSuffixTo: [/\.vue$/],
                    },
                },
            ],
        },
        resolve: {
            extensions: [
                '*',
                '.js',
                '.jsx',
                '.vue',
                '.ts',
                '.tsx',
            ],
        },
    });
