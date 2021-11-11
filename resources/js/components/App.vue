<template>
  <div class="container">
    <div class="row">
      <div class="col"><h1>juegos de azar</h1></div>
      <router-link to="/create" class="btn btn-success" tag="button">Añadir Juego</router-link>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "App",
};
</script>

<style>
</style>