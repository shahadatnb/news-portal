import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['spa/src/main.js'],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './spa/src'),
        },
    },
    css: {
        postcss: './postcss.config.js',
    },
    server: {
        hmr: {
            host: 'localhost',
        },
        cors: true,
        port: 5173,
    },
    build: {
        outDir: 'public/build',
        emptyOutDir: true,
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[name].[hash].[ext]',
            },
        },
    },
});