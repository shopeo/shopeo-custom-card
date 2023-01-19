const state = {
    file: '',
    select_avatar: '',
    avatars: []
};
const getters = {
    file(state) {
        return state.file;
    },
    select_avatar(state) {
        return state.select_avatar;
    },
    avatars(state) {
        return state.avatars;
    }
};
const actions = {
    uploadAvatar({commit}, file) {
        return new Promise((resolve, reject) => {
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
                    let avatars = JSON.parse(localStorage.getItem('avatars'));
                    data.forEach(image => avatars.push(image.url));
                    localStorage.setItem('avatars', JSON.stringify(avatars));
                    resolve();
                },
                error: function (err) {
                    reject();
                }
            });
        });
    },
    file({commit}, file) {
        commit('file', file);
    },
    select_avatar({commit}, select_avatar) {
        commit('select_avatar', select_avatar);
    },
    avatars({commit}) {
        return new Promise((resolve, reject) => {
            let avatars = JSON.parse(localStorage.getItem('avatars'));
            commit('avatars', avatars);
            resolve();
        });
    },
    clear({commit}) {
        return new Promise((resolve, reject) => {
            let avatars = [];
            localStorage.setItem('avatars', JSON.stringify(avatars));
            resolve();
        });
    }
};
const mutations = {
    file(state, file) {
        state.file = file;
    },
    select_avatar(state, select_avatar) {
        state.select_avatar = select_avatar;
    },
    avatars(state, avatars) {
        state.avatars = avatars;
    }
};

export default {
    state, getters, actions, mutations
}