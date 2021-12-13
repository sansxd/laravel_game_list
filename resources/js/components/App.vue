<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" absolute temporary app>
            <v-list nav dense>
                <v-list-item-group
                    v-model="group"
                    active-class="deep-purple--text text--accent-4"
                >
                    <v-list-item>
                        <v-list-item-icon>
                            <v-icon>mdi-account</v-icon>
                        </v-list-item-icon>
                        <v-list-item-title to="/login">Login</v-list-item-title>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>
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
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </v-main>
    </v-app>
</template>

<script>
export default {
    name: "App",
    data: () => ({ drawer: false, group: null }),
};
</script>

<style></style>
