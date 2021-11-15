const mutations = {
    FETCH_GAMES(state, games) {
        state.games = games
    },
    CREATE_GAME(state, game) {
        state.games.push(game)
    },
    DELETE_GAME(state, game) {
        const index = state.games.findIndex(item => item.id === game)
        state.games.splice(index, 1)
    },
    EDIT_GAME(state, game) {
        const index = state.games.findIndex(item => item.id === game.id)
        return index
    },
    GET_GAME(state, game) {
        state.gameById = state.games.find(item => item.id === game.id)
    }
}
export default mutations