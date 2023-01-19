const state = {
    frame_categories: [],
    product_count: 0,
    frames: [],
    skins: [],
    select_frame: ''
};
const getters = {
    frame_categories(state) {
        return state.frame_categories;
    },
    product_count(state) {
        return state.product_count;
    },
    frames(state) {
        return state.frames;
    },
    skins(state) {
        return state.skins;
    },
    select_frame(state) {
        return state.select_frame;
    }
};
const actions = {
    frame_categories({commit}) {
        return new Promise((resolve, reject) => {
            jQuery.ajax({
                url: shopeo_custom_card_frontend.ajax_url,
                type: 'GET',
                data: {
                    action: 'frame_categories'
                },
                success: function (data) {
                    commit('frame_categories', data);
                    let count = 0;
                    data.map(category => count += category.count);
                    commit('product_count', count);
                    resolve();
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    },
    product_count({commit}, product_count) {
        commit('product_count', product_count);
    },
    frames({commit}, category, skin) {
        return new Promise((resolve, reject) => {
            resolve();
        });
    },
    skins({commit}) {
        return new Promise((resolve, reject) => {
            jQuery.ajax({
                url: shopeo_custom_card_frontend.ajax_url,
                type: 'GET',
                data: {
                    action: 'skin_attributes'
                },
                success: function (data) {
                    console.log(data);
                    resolve();
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    },
    select_frame({commit}, select_frame) {
        commit('select_frame', select_frame);
    }
};
const mutations = {
    frame_categories(state, frame_categories) {
        state.frame_categories = frame_categories;
    },
    product_count(state, product_count) {
        state.product_count = product_count;
    },
    frames(state, frames) {
        state.frames = frames;
    },
    skins(state, skins) {
        state.skins = skins;
    },
    select_frame(state, select_frame) {
        state.select_frame = select_frame;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
}