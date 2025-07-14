import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/css/form.css', 'resources/js/form.js', 'resources/css/table.css', 'resources/js/table.js', 'resources/css/view.css', 'resources/js/view.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
