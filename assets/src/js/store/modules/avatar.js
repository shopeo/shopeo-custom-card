const state = {
    file: '',
    current: '',
    avatars: []
};
const getters = {
    file(state) {
        return state.file;
    },
    current(state) {
        return state.current;
    },
    avatars(state) {
        return state.avatars;
    }
};
const actions = {
    uploadAvatar({commit}, file) {
        let formData = new FormData();
        formData.set('file', file);
        formData.set('action', 'upload_avatar');
        jQuery.ajax({
            url: shopeo_custom_card_frontend.ajax_url,
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
            }
        })
    },
    file({commit}, file) {
        commit('file', file);
    },
    current({commit}, current) {
        commit('current', current);
    },
    avatars({commit}) {
        return [];
    },
    clear({commit}) {
        jQuery.ajax({
            url: shopeo_custom_card_frontend.ajax_url,
            type: 'POST',
            data: {
                action: 'clear_avatars'
            },
            success: function (data) {
                console.log(data);
            }
        });
    }
};
const mutations = {
    file(state, file) {
        state.file = file;
    },
    current(state, current) {
        state.current = current;
    },
    avatars(state, avatars) {
        state.avatars = avatars;
    }
};

export default {
    state, getters, actions, mutations
}