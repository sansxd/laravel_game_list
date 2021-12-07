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
        state.games.findIndex(item => item.id === game.id)
    },
    GET_GAME(state, game) {
        state.gameById = game
    },
    UPLOAD_FILE(state, file) {
        state.gameById.file_id = file.id
    }
}
export default mutations