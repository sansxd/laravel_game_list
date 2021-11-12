const mutations = {
    FETCH_GAMES(state, games) {
        return state.games = games
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
        const index = state.games.find(item => item.id === game.id)
        return state.gameById = index;
    }
}
export default mutations