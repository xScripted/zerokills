import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        noticias: [],
        jugadores: [],
        calendario: [],
        media: [],
        banners: []
    },
    getters: {
        noticias: state => state.noticias,
        noticias6: state => state.noticias.slice(0,6),
        calendario: state => state.calendario,
        calendario6: state => state.calendario.slice(0,6),
        media: state => state.media,
        media6: state => state.media.slice(0,6),
        jugadores: state => state.jugadores,
        banners: state => state.banners,
    },
    mutations: {
        setNoticias: (state, noticias) => state.noticias = noticias,
        setCalendario: (state, calendario) => state.calendario = calendario,
        setMedia: (state, media) => state.media = media,
        setJugadores: (state, jugadores) => state.jugadores = jugadores,
        setBanners: (state, banners) => state.banners = banners,
    },
    actions: {
        async loadNoticias({ commit }) {
            var request = await axios.get(process.env.MIX_APP_URL + '/api/v1/noticias')
            console.log(process.env.MIX_APP_URL);
            commit('setNoticias', request.data);
        },
        async loadCalendario({ commit }) {
            var request = await axios.get(process.env.MIX_APP_URL + '/api/v1/calendario')
            commit('setCalendario', request.data);
        },
        async loadMedia({ commit }) {
            var request = await axios.get(process.env.MIX_APP_URL + '/api/v1/media')
            commit('setMedia', request.data);
        },
        async loadBanners({ commit }) {
            var request = await axios.get(process.env.MIX_APP_URL + '/api/v1/banners')
            commit('setBanners', request.data);
        },
        async loadJugadores({ commit }) {
            var request = await axios.get(process.env.MIX_APP_URL + '/api/v1/jugadores')

            var teams = {};

            for(let jugador of request.data) {
                if(!teams.hasOwnProperty(jugador.team)) {
                    teams[jugador.team] = [];
                }

                teams[jugador.team].push(jugador);
            }


            commit('setJugadores', Object.values(teams) );

        }
    },
  })