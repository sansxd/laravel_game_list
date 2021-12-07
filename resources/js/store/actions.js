import axios from "axios";
import router from "../router";
// example axios.post('/api', data, config).then(
let config = {
    header: {
        "Content-Type": "multipart/form-data",
    },
};

const apiGame = "/api/game";
const apifile = "/api/fileupload";
let actions = {
    async fetchGames({ commit }) {
        try {
            const res = await axios.get(apiGame);
            commit("FETCH_GAMES", res.data);
        } catch (error) {
            console.log(error);
        }
    },
    async createGame({ commit }, game) {
        try {
            const res = await axios.post(apiGame, game);
            if (res.status == 201) {
                commit("CREATE_GAME", res.data);
                router.push({ name: "inicio" });
            }
        } catch (error) {
            console.log(error);
        }
    },
    async updateGame({ commit }, game) {
        try {
            const res = await axios.patch(`${apiGame}/${game.id}`, game);
            if (res.status == 200) {
                commit("EDIT_GAME", res.data);
                router.push({ name: "inicio" });
            }
        } catch (error) {
            console.log(error);
            console.log(error.response.data.errors);
        }
    },
    async getGameById({ commit }, gameId) {
        try {
            const res = await axios.get(`${apiGame}/${gameId}`);
            commit("GET_GAME", res.data);
        } catch (error) {
            console.log(error);
        }
    },
    async deleteGame({ commit }, game) {
        try {
            const res = await axios.delete(`${apiGame}/${game}`);
            if (res.data.message === "delete success") {
                commit("DELETE_GAME", game);
            }
        } catch (error) {
            console.log(error);
        }
    },
    async uploadImage({ commit }, file) {
        try {
            const formData = new FormData();
            formData.append("image", file);
            const res = await axios.post(apifile, formData);
            if (res.status == 200) {
                commit("UPLOAD_FILE", res.data);
            }
        } catch (error) {
            console.log(error);
        }
    },
};

export default actions;
