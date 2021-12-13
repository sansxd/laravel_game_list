<template>
    <div>
        <form @submit="createGame(game)">
            <h4 class="text-center font-weight-bold">Añadir juego</h4>
            <div class="form-group">
                <label for="name">Nombre</label>
                <v-text-field
                    id="name"
                    v-model="game.name"
                    label="Nombre del juego"
                    required
                ></v-text-field>
            </div>
            <div class="form-group">
                <label for="description">Descripcion</label>
                <v-textarea
                    id="description"
                    label="Descripcion del juego"
                    auto-grow
                    v-model="game.description"
                ></v-textarea>
            </div>
            <template>
                <v-file-input
                    accept="image/*"
                    label="File input"
                    show-size
                    counter
                    @change="previewFiles"
                ></v-file-input>
            </template>
            <div class="form-group">
                <v-checkbox
                    v-model="game.status"
                    label="Disponible"
                ></v-checkbox>
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
        <router-link class="btn btn-info" to="/" tag="button"
            >Volver</router-link
        >
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
                status: 1,
            },
            gameImage: {},
        };
    },
    methods: {
        createGame(game) {
            this.$store.dispatch("createGame", game);
        },
        previewFiles(event) {
            let file = event;
            if (file) {
                this.gameImage = file;
            }
        },
    },
    computed: {
        isValid() {
            return (
                this.game.name !== ""
            );
        },
    },
};
</script>
