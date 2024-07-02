import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import vue from'@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.jsx','resources/js/app.vue','resources/css/app.scss'],
            refresh: true,
        }),
        react(),
        vue({
            template: {
                compilerOptions:{

                },
                transformAssetUrls:{

                },
            }
        }),
    ],
});
