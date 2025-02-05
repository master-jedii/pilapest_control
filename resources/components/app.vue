<template>
  <div>
    <Navbar />  <!-- เรียกใช้งาน Navbar ที่นี่ -->
  </div>
</template>

<script>
import Navbar from '../components/Navbar.vue'; // นำเข้า Navbar.vue

export default {
  name: 'App',
  components: {
    Navbar,  // ลงทะเบียน Navbar
  },
};
</script>

<style>
/* เพิ่มการตั้งค่า style ตามต้องการ */
</style>
