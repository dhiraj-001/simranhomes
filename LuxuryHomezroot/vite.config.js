import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'frontend_assets/sass/home/home.css',
                'frontend_assets/css/developers.css',
                'frontend_assets/css/hoztab.css',
                'frontend_assets/css/allprojects.css',
                'frontend_assets/css/aresponsive.css',
                'frontend_assets/js/main.js',
                'frontend_assets/js/svg-loader.js',
                'frontend_assets/images/fav_sec.png',
                'frontend_assets/images/fav.png',
                'frontend_assets/images/logo.png',
                'frontend_assets/images/main_logo.png',
                'frontend_assets/images/home/fav_sec.png',
                'frontend_assets/images/home/bfacebook.png',
                'frontend_assets/images/home/btwitter.png',
                'frontend_assets/images/home/blinkedin.png',
                'frontend_assets/images/home/bwhatsapp.png',
                'frontend_assets/images/home/bemail.png',
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    let extType = assetInfo.name.split('.').at(1);
                    if (/png|jpe?g|svg|gif|tiff|bmp|ico/i.test(extType)) {
                        extType = 'img';
                    }
                    return `assets/${extType}/[name]-[hash][extname]`;
                },
                chunkFileNames: 'assets/js/[name]-[hash].js',
                entryFileNames: 'assets/js/[name]-[hash].js',
            },
        },
    },
});
