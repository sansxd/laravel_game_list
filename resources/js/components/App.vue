<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app> </v-navigation-drawer>
        <!-- NAVBAR -->
        <v-app-bar app>
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-toolbar-title>Aplicacion de Juegos</v-toolbar-title>
            <v-spacer></v-spacer>

            <template v-if="this.$route.name !== 'create'">
            <v-btn color="primary" to="/create"> Añadir Juego </v-btn>
            </template>
        </v-app-bar>
        <!-- MAIN -->
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

<style></style>
