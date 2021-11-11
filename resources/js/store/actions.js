import axios from 'axios';

var apiGame = '/api/game'
let actions = {
    fetchGames({ commit }) {
        axios.get(apiGame)
            .then(res => {
                commit('FETCH_GAMES', res.data)
            }).catch(err => {
                console.log(err)
            })
    },
    createGame({ commit }, game) {
        axios.post(apiGame, game)
            .then(res => {
                commit('CREATE_GAME', res.data)
            }).catch(err => {
                console.log(err)
            })

    },
    editGame({ commit }, game) {
        axios.put(`${apiGame}/${game.id}`, game)
            .then(res => {
                if (res.status == 200) {
                    commit('EDIT_GAME', res.data)
                }
            }).catch(err => {
                console.log(err)
                console.log(err.response.data.errors)
            })
    },
    getGameById({ commit }, gameId) {
        axios.get(`${apiGame}/${gameId}`)
            .then(res => {
                commit('GET_GAME', res.data)
            }).catch(err => {
                console.log(err)
            })
    },
    deleteGame({ commit }, game) {
        axios.delete(`${apiGame}/${game}`)
            .then(res => {
                if (res.data.message === 'delete success')
                    commit('DELETE_GAME', game)
            }).catch(err => {
                console.log(err)
            })
    }
}

export default actions