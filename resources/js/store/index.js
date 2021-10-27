import { createStore } from "vuex";

export default createStore({
    state: {
        active: 1,
    },

    mutations: {
        change(state, active) {
            state.active = active;
        },
    },

    getters: {
        active: (state) => state.active,
    },
});
