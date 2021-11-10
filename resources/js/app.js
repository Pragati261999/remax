require("./bootstrap");

window.Vue = require("vue").default;
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import router from "./router";
import App from "./layouts/App.vue";
Vue.use(Vuex);

Vue.component(
    "loader",
    require("./components/commonComponents/Loader.vue").default
);

Vue.component(
    "NoData",
    require("./components/commonComponents/NoData.vue").default
);

Vue.component(
    "add-header",
    require("./components/commonComponents/Header.vue").default
);

Vue.component(
    "add-footer",
    require("./components/commonComponents/Footer.vue").default
);

Vue.component(
    "property-search",
    require("./components/search/index.vue").default
);

Vue.component(
    "property-listing",
    require("./components/PropertyListing.vue").default
);

Vue.component("faq", require("./components/Faq.vue").default);

const store = new Vuex.Store({
    state: {
        auth_token: null,
        auth_user: null,
    },
    plugins: [createPersistedState()],
    mutations: {
        addAuthToken(state, token) {
            state.auth_token = token;
        },
        removeAuthToken(state) {
            state.auth_token = null;
        },

        addAuthUser(state, user) {
            state.auth_user = user;
        },
        removeAuthUser(state) {
            state.auth_user = null;
        },
    },
});

const app = new Vue({
    router,
    el: "#app",
    store,
    render: (h) => h(App),
});
