<template>
  <div class="bg-dark text-white vh-100 p-3" style="width: 250px; position: fixed; top: 0; left: 0;">
    <h4>Menu FromVUE</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/orders">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/products">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/create">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/reports">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/settings">Settings</a>
      </li>
      <!-- ปุ่ม Logout -->
      <li class="nav-item">
        <form action="/logout" method="POST" @submit.prevent="logout">
          <button type="submit" class="nav-link text-danger border-0 bg-transparent">Sign Out</button>
        </form>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Navbar',
  methods: {
    // ฟังก์ชัน logout
    logout() {
      // ส่งคำขอ POST ไปที่ route /logout เพื่อให้ทำการ logout
      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      
      fetch('/logout', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrfToken,  // เพิ่ม CSRF Token ใน Header
          'Content-Type': 'application/json',
        },
      })
        .then(response => {
          if (response.ok) {
            window.location.href = '/login';  // พาไปที่หน้า login เมื่อ logout สำเร็จ
          } else {
            console.error('Logout failed');
          }
        })
        .catch(error => {
          console.error('Error during logout:', error);
        });
    },
  },
};
</script>

<style scoped>
.nav-link {
  padding: 10px;
  font-size: 18px;
}
</style>
