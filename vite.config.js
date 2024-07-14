import { defineConfig } from 'vite';
import { fileURLToPath, URL } from "url";

import laravel from 'laravel-vite-plugin';

const APP_URL = process.env.APP_URL || "127.0.0.1"

const clPort = 3000

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'node_modules/bootstrap/dist/js/bootstrap.min.js',
            ],
            port: 3000,
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
        host: '0.0.0.0',
        port: clPort, // port of the server
        strictPort: true,
        // https: true, // breaks
        hmr: {
            clientPort: clPort,
            port: 8000,
            host: 'localhost',
            protocol: 'ws'
        },
        // // hmr: false,
        watch: {
            awaitWriteFinish: true,
            usePolling: false,
            interval: 1000
        }
    }
});