<template>
  <div>
    <h3 class="text-center">Edita el juego: {{ gameById.name }}</h3>
    <div class="row">
      <div class="col">
        <form @submit.prevent="updateGame" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input
              type="text"
              class="form-control"
              id="name"
              v-model="gameById.name"
            />
          </div>
          <div class="form-group">
            <label for="description">Descripcion</label>
            <input
              type="text"
              class="form-control"
              id="description"
              v-model="gameById.description"
            />
          </div>
          <div class="form-group">
            <label for="url">Url</label>
            <input
              type="text"
              class="form-control"
              id="url"
              v-model="gameById.url"
            />
          </div>
          <div class="form-group">
            <label for="urlImage">Url de Imagen</label>
            <input
              type="text"
              class="form-control"
              id="urlImage"
              v-model="gameById.url_image"
            />
          </div>
          <div class="form-group">
            <label for="imagen">Imagen</label>
            <div class="custom-file">
              <input
                type="file"
                class="form-control"
                id="inputGroupFile01"
                accept="image/*"
                @change="previewFiles"
              />
              <label class="custom-file-label" for="inputGroupFile01"
                >Elegir una Imagen</label
              >
            </div>
          </div>
          <div class="form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="checkGame"
              v-model="gameById.status"
            />
            <label class="form-check-label" for="checkGame">Disponible</label>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
    <br />
    <router-link class="btn btn-info" to="/" tag="button">Volver</router-link>
  </div>
</template>
 
<script>
import { mapGetters } from "vuex";

export default {
  props: {
    id: {
      required: true,
      type: [String, Number],
    },
  },
  data() {
    return {
      game: {},
      uploadFieldName: "",
    };
  },
  mounted() {
    this.getGameByid();
  },
  methods: {
    getGameByid() {
      this.$store.dispatch("getGameById", this.id);
    },
    updateGame() {
      this.$store.dispatch("editGame", this.gameById);
    },
    previewFiles(event) {
      console.log(event.target.files);
    },
  },
  computed: {
    ...mapGetters(["gameById"]),
  },
};
</script>