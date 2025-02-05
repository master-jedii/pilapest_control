<template>
  <div class="bg-dark text-white vh-100 p-3" style="width: 250px; position: fixed; top: 0; left: 0;">
    <h4>Menu</h4>
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
        <a class="nav-link text-white" href="/customers">Customers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/reports">Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="/settings">Settings</a>
      </li>
      <li class="nav-item">
        <form action="/logout" method="POST">
          <button class="nav-link text-danger border-0 bg-transparent" type="submit">Sign Out</button>
        </form>
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
.nav-link {
  padding: 10px;
  font-size: 18px;
}
</style>
