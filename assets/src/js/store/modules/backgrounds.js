const state = {
    background_categories: [],
    background_count: 0,
    backgrounds: [],
    select_background: {
        id: 0,
        name: '',
        price: 0,
        image: ''
    }
};
const getters = {
    background_categories(state) {
        return state.background_categories;
    },
    background_count(state) {
        return state.background_count;
    },
    backgrounds(state) {
        return state.backgrounds;
    },
    select_background(state) {
        return state.select_background;
    }
};
const actions = {
    background_categories({commit}) {
        return new Promise((resolve, reject) => {
            jQuery.ajax({
                url: shopeo_custom_card_frontend.ajax_url,
                type: 'GET',
                data: {
                    action: 'background_categories'
                },
                success: function (data) {
                    commit('background_categories', data);
                    let count = 0;
                    data.map(category => count += category.count);
                    commit('background_count', count);
                    resolve();
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    },
    background_count({commit}, background_count) {
        commit('background_count', background_count);
    },
    backgrounds({commit}, params) {
        return new Promise((resolve, reject) => {
            jQuery.ajax({
                url: shopeo_custom_card_frontend.ajax_url,
                type: 'POST',
                data: {
                    action: 'get_products_by_backgrounds',
                    category: params.category,
                },
                success: function (data) {
                    console.log(data);
                    commit('backgrounds', data);
                    resolve();
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    },
    select_background({commit}, select_background) {
        commit('select_background', select_background);
    }
};
const mutations = {
    background_categories(state, background_categories) {
        state.background_categories = background_categories;
    },
    background_count(state, background_count) {
        state.background_count = background_count;
    },
    backgrounds(state, backgrounds) {
        state.backgrounds = backgrounds;
    },
    select_background(state, select_background) {
        state.select_background = select_background;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}