const state = {
    step: 'upload-photo',
};
const getters = {
    step(state) {
        return state.step;
    }
};
const actions = {
    step({commit}, step) {
        commit('step', step);
    }
};
const mutations = {
    step(state, step) {
        state.step = step;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}