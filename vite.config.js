import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue'; // เพิ่มการนำเข้า vue
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        vue(), // ใช้ plugin vue ที่นำเข้ามา
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        port: 5175, // กำหนดพอร์ตใหม่ที่ไม่ซ้ำกับพอร์ตอื่น
    },
});
