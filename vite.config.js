import { defineConfig } from 'vite';
import { fileURLToPath, URL } from "url";

import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            
            refresh: true,
        }),
    ],
    resolve:{
        alias: [
            {
                find: '@modules',
                replacement: fileURLToPath(new URL('./node_modules', import.meta.url))
            },
            {
                find: '@bootstrap',
                replacement: fileURLToPath(new URL('./node_modules/bootstrap', import.meta.url))
            }
        ]
    },
    server: {
        port: 3000,
        hmr: {
            host: 'localhost',
            // host: '127.0.0.1',
            port: 3000,
        },
        watch: {
            usePolling: true,
            interval: 1000,

        }
    }
});
