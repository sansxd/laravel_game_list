<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app> </v-navigation-drawer>

    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Application Juegos</v-toolbar-title>
      <router-link to="/create" class="btn btn-success" tag="button"
        >Añadir Juego</router-link
      >
    </v-app-bar>

    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
export default {
  name: "App",
  data: () => ({ drawer: false }),
};
</script>

<style>
</style>