// webpack.mix.js

let mix = require('laravel-mix');
mix.disableNotifications();
mix.sass('resources/scss/bootstrap5/bootstrap.scss', 'css/bundle.css').setPublicPath('public');
mix.sass('resources/scss/theme/theme.scss', 'css/misp-theme.css').setPublicPath('public');

mix.js('resources/js/app.js', 'js/bundle.js').setPublicPath('public');
