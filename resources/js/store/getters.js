let getters = {
    games: state => {
        return state.games
    },
    gameById: state => {
        return state.gameById
    },
    errors: state => {
        return state.errors
    },
    gameImage: state => {
        return state.gameImage
    },
}

export default getters