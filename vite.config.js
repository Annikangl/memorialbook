import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

const host = 'memorialbook.loc';

export default defineConfig({

    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],

    // server: {
    //     host,
    //     hmr: { host },
    //     https: {
    //         key: fs.readFileSync(`./docker/nginx/ssl/memorialbook.site.key`),
    //         cert: fs.readFileSync(`./docker/nginx/ssl/memorialbook.site.crt`),
    //     },
    // },

    alias: {
        '$': 'jQuery'
    },
});
