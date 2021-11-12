require("./bootstrap");

window.Vue = require("vue").default;
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

import router from "./router";
import App from "./layouts/App.vue";
import Vue from "vue";
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

Vue.component(
    "notifications",
    require("./components/dashboard/Notification.vue").default
);

Vue.component(
    "bookmarks",
    require("./components/dashboard/Bookmark.vue").default
);

Vue.component("faq", require("./components/Faq.vue").default);

const store = new Vuex.Store({
    state: {
        auth_token: null,
        auth_user: null,
        favourite: [],
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

        addFavourite(state, ml_num) {
            state.favourite.push(ml_num);
        },
        removeFavourite(state, ml_num) {
            var index = state.favourite.indexOf(ml_num);
            if (index !== -1) {
                state.favourite.splice(index, 1);
            }
        },
        removeBookMark(state) {
            state.favourite = [];
        },
    },
});

const app = new Vue({
    router,
    el: "#app",
    store,
    render: (h) => h(App),
});
