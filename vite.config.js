import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

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
    resolve: {
        alias: {
            // Garante que o jQuery seja resolvido corretamente
            '$': 'jquery',
            'jQuery': 'jquery',
        }
    },
    optimizeDeps: {
        include: [
            'jquery',
            'datatables.net',
            'datatables.net-bs5',
            'datatables.net-buttons',
            'datatables.net-buttons-bs5',
            'datatables.net-responsive',
            'datatables.net-responsive-bs5',
            'jszip',
            'pdfmake',
            'sweetalert2'
        ]
    }
});