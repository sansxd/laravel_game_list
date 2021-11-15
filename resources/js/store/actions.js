import axios from 'axios';
import router from '../router';

const apiGame = '/api/game'
let actions = {
    async fetchGames({ commit }) {
        try {
            const res = await axios.get(apiGame)
            commit('FETCH_GAMES', res.data)
        } catch (error) {
            console.log(error)
        }
    },
    async createGame({ commit }, game) {
        try {
            const res = await axios.post(apiGame, game)
            if (res.status == 201) {
                commit('CREATE_GAME', res.data)
                router.push({ name: 'inicio' })
            }
        } catch (error) {
            console.log(error)
        }
    },
    async editGame({ commit }, game) {
        try {
            const res = await axios.put(`${apiGame}/${game.id}`, game)
            if (res.status == 200) {
                commit('EDIT_GAME', res.data)
                router.push({ name: 'inicio' })
            }
        } catch (error) {
            console.log(error)
            console.log(error.response.data.errors)
        }
    },
    async getGameById({ commit }, gameId) {
        try {
            const res = await axios.get(`${apiGame}/${gameId}`)
            commit('GET_GAME', res.data)
        } catch (error) {
            console.log(error)
        }
    },
    async deleteGame({ commit }, game) {
        try {
            const res = await axios.delete(`${apiGame}/${game}`)
            if (res.data.message === 'delete success') {
                commit('DELETE_GAME', game);
            }
        } catch (error) {
            console.log(error)
        }
    },
}

export default actions