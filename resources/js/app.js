import { createApp } from 'vue';
import App from '../components/app.vue'; // นำเข้า App.vue

const app = createApp(App); // เริ่มต้น Vue app โดยการใช้ App.vue
app.mount('#app'); // ทำการ mount Vue app ที่ element #app
