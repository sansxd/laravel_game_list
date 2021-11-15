let getters = {
    games: state => {
        return state.games
    },
    gameById: state => {
        return state.gameById
    },
    errors: state => {
        return state.errors
    }
}

export default getters