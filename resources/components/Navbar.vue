<template>
  <div class="bg-dark text-white vh-100 p-3" style="width: 250px;">
    <h4>Menu</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Order</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Product</a>
      </li>
      <!-- เปลี่ยน href เพื่อเชื่อมต่อกับ Route ใน Laravel -->
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Settings</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="#">Sign Out</a>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Navbar'
};
</script>

<style scoped>
/* ปรับแต่งสไตล์เพิ่มเติม */
.nav-link {
  padding: 10px;
  font-size: 18px;
}
</style>
