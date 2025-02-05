<template>
  <div>
    <Navbar />  <!-- เรียกใช้งาน Navbar ที่นี่ -->
    <div class="container mt-5" style="margin-left: 270px;">
      <h1>Welcome to Dashboard</h1>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>
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
