import { defineConfig } from 'vite';
import { fileURLToPath, URL } from "url";

import laravel from 'laravel-vite-plugin';

const APP_URL = process.env.APP_URL || "127.0.0.1"

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'node_modules/bootstrap/dist/js/bootstrap.min.js',
            ],
            
            refresh: true,
            // env: {
                // APP_URL: APP_URL,
            // },
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
        // host: '0.0.0.0',
        host: 'localhost',
        strictPort: true,
        hmr: {
            host: 'localhost',
            port:3000
        },
        watch: {
            usePolling: true,
            interval: 1000,
        }
    }
});