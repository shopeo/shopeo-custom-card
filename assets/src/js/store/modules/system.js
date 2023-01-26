const state = {
    currency_symbol: ''
};
const getters = {
    currency_symbol(state) {
        return state.currency_symbol;
    }
};
const actions = {
    currency_symbol({commit}) {
        return new Promise((resolve, reject) => {
            jQuery.ajax({
                url: shopeo_custom_card_frontend.ajax_url,
                type: 'GET',
                data: {
                    action: 'get_woocommerce_config'
                },
                success: function (data) {
                    commit('currency_symbol', data.currency_symbol);
                    resolve();
                },
                error: function (err) {
                    reject(err);
                }
            });
        });
    }
};
const mutations = {
    currency_symbol(state, currency_symbol) {
        state.currency_symbol = currency_symbol;
    }
};

export default {
    state, getters, actions, mutations
}