<template>
    <div class="d-flex">
      <!-- Sidebar Navbar -->
      <Navbar />
      <!-- Main Content -->
      <div class="container-fluid p-3 flex-grow-1">
        <h2>Dashboard</h2>
      </div>
    </div>
  </template>
  
  <script>
  import Navbar from './Navbar.vue';
  
  export default {
    name: 'App',
    components: {
      Navbar
    }
  };
  </script>
  
  <style>
  /* ทำให้ Sidebar Navbar ชิดซ้ายและเต็มจอ */
  .d-flex {
    display: flex;
  }
  </style>
  