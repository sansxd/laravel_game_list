<template>
    <div>
        <h4 class="font-weight-bold">Listado</h4>
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="game in games" :key="game.id">
                <td><strong>{{game.name}}</strong></td>
                <td><a :href="game.url" target="_blank"><img :src="game.url_image" class="img-fluid" alt="Responsive image"></a></td>
                <td v-if="game.description">{{game.description}}</td>
                <td v-else>No tiene descripcion</td>
                <td>{{game.status ? 'Disponible ': 'No Disponible'}}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: game.id }}" class="btn btn-success">Editar</router-link>
                        <button class="btn btn-danger" @click="deleteGame(game.id)">Borrar</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>
    
<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "game",
        mounted() {
            this.$store.dispatch('fetchGames')
        },
        methods: {
            deleteGame(game) {
                this.$store.dispatch('deleteGame',game)
            }
        },
        computed: {
            ...mapGetters([
                'games'
            ])
        }
    }
</script>