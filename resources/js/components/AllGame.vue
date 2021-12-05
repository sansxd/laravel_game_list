<template>
    <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">Nombre</th>
          <th class="text-left">Imagen</th>
          <th class="text-left">Descripcion</th>
          <th class="text-left">Estado</th>
          <th class="text-left">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="game in games" :key="game.id">
          <td>
            <strong>{{ game.name }}</strong>
          </td>
          <td>
            <a :href="game.url" target="_blank"
              ><img
                :src="game.url_image"
                class="img-fluid"
                alt="Responsive image"
            /></a>
          </td>
          <td v-if="game.description">{{ game.description }}</td>
          <td v-else>No tiene descripcion</td>
          <td>{{ game.status ? "Disponible " : "No Disponible" }}</td>
          <td>
            <v-row justify="space-around">
              <v-btn fab color="success" :to="{ name: 'edit', params: { id: game.id } }">
                <v-icon > mdi-pencil </v-icon>
              </v-btn>
              <v-btn fab color="error" @click="deleteGame(game.id)"><v-icon > mdi-delete </v-icon></v-btn>
            </v-row>
          </td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>
    
<script>
import { mapGetters } from "vuex";

export default {
  name: "game",
  mounted() {
    this.$store.dispatch("fetchGames");
  },
  methods: {
    deleteGame(game) {
      this.$store.dispatch("deleteGame", game);
    },
  },
  computed: {
    ...mapGetters(["games"]),
  },
};
</script>