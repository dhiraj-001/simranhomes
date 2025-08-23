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
                'frontend_assets/css/contact.css',
                'frontend_assets/css/property.css',
                'frontend_assets/css/fancybox.css',
                'frontend_assets/js/main.js',
                'frontend_assets/js/svg-loader.js',
                'frontend_assets/images/fav_sec.png',
                'frontend_assets/images/fav.png',
                'frontend_assets/images/logo.png',
                'frontend_assets/images/main_logo.png',
                'frontend_assets/images/home/bfacebook.png',
                'frontend_assets/images/home/btwitter.png',
                'frontend_assets/images/home/blinkedin.png',
                'frontend_assets/images/home/bwhatsapp.png',
                'frontend_assets/images/home/bemail.png',
                'frontend_assets/icon/search.svg',
                'frontend_assets/icon/mappin1.svg',
                'frontend_assets/icon/rupee.svg',
                'frontend_assets/icon/hotel.svg',
                'frontend_assets/icon/top-right.svg',
                'frontend_assets/icon/right-arrow.svg',
                'frontend_assets/icon/blogshare.svg',
                'frontend_assets/icon/formicon.svg',
                'frontend_assets/icon/icons8-call.gif',
                'admin_assets/images/main_logo.png',
                'frontend_assets/icon/quotes.svg',
                'frontend_assets/icon/stars.svg',
                'frontend_assets/icon/adlocation.png',
                'frontend_assets/icon/admail.png',
                'frontend_assets/icon/adphone.png',
                'resources/css/custom.css',
                'frontend_assets/images/home/fixedbg.webp',
                'frontend_assets/images/home/footer_bg.jpg',
                'frontend_assets/images/bg1.webp',
                'frontend_assets/font/Champignon.ttf',
                'frontend_assets/images/about/founder.webp',
                'frontend_assets/images/about/vision.webp',
                'frontend_assets/images/about/mission.webp',
                'frontend_assets/images/about/strength.webp',
                'frontend_assets/images/awards/award-1.png',
                'frontend_assets/images/awards/award-2.png',
                'frontend_assets/images/awards/award-3.png',
                'frontend_assets/images/awards/award-4.png',
                'frontend_assets/js/about.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // This line is the key fix for the output directory
        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    let extType = assetInfo.name.split('.').at(1);
                    if (/png|jpe?g|svg|gif|tiff|bmp|ico|webp/i.test(extType)) { // Added webp here
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