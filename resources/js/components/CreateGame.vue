<template>
  <div>
    <form @submit="createGame(game)">
      <h4 class="text-center font-weight-bold">Añadir juego</h4>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input
          id="name"
          type="text"
          v-model="game.name"
          class="form-control"
        />
      </div>
      <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea
          id="description"
          v-model="game.description"
          class="form-control"
        >
        </textarea>
      </div>
      <div class="form-group">
        <label for="url">Url</label>
        <input
          id="url"
          type="text"
          v-model="game.url"
          class="form-control"
        />
      </div>
      <div class="form-group">
        <label for="urlImage">Url de imagen</label>
        <input
          id="urlImage"
          type="text"
          v-model="game.url_image"
          class="form-control"
        />
      </div>
      <div class="form-group">
        <input type="checkbox" id="checkGame" v-model="game.status" />
        <label class="form-check-label" for="checkGame">Disponible</label>
      </div>
      <div class="form-group">
        <button
          :disabled="!isValid"
          class="btn btn-block btn-primary"
          @click.prevent="createGame(game)"
        >
          Añadir Juego
        </button>
      </div>
    </form>
    <router-link class="btn btn-info" to="/" tag="button">Volver</router-link>
  </div>
</template>
    
    <script>
export default {
  name: "CreateGame",
  data() {
    return {
      game: {
        name: "",
        description: "",
        url: "",
        url_image: "",
        status: 1,
      },
    };
  },
  methods: {
    createGame(game) {
      this.$store.dispatch("createGame", game);
      this.$router.push({ path: "/" });
    },
  },
  computed: {
    isValid() {
      return (
        this.game.name !== "" &&
        this.game.url !== "" &&
        this.game.url_image !== ""
      );
    },
  },
};
</script>